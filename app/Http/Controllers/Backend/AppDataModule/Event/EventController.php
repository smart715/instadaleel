<?php

namespace App\Http\Controllers\Backend\AppDataModule\Event;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Event;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EventController extends Controller
{
    //index function start
    public function index(){
        try{
            if( can("all_event") ){
                return view("backend.modules.app_data_module.event.index");
            }
            else{
                return view("errors.403");
            }
        }
        catch( Exception $e ){
            return back()->with('warning', $e->getMessage());
        }
    }
    //index function end


    //data function start
    public function data(){
        try{
            if( can('all_event') ){
                
                $event = Event::orderBy("position","asc")->select("id","position","image","is_active","title",'date','time')->get();
    
                return DataTables::of($event)
                ->rawColumns(['action', 'is_active','image','date_time'])
                ->editColumn('image', function(Event $event){
                    $src = asset("images/event/".$event->image);
                    return "
                        <img src='$src' width='50px'>
                    ";
                })
                ->editColumn('date_time', function (Event $event) {
                    return $event->date .' - '. $event->time;
                })
                ->editColumn('is_active', function (Event $event) {
                    if ($event->is_active == true) {
                        return '<p class="badge badge-success">Active</p>';
                    } else {
                        return '<p class="badge badge-danger">Inactive</p>';
                    }
                })
                ->addColumn('action', function (Event $event) {
                    return '
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown'.$event->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown'.$event->id.'">
    
                            '.( can("edit_event") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('event.edit.modal',encrypt($event->id)).'" data-target="#largeModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            ': '') .'

                            '.( can("delete_event") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('event.delete.modal',encrypt($event->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-trash"></i>
                                Delete
                            </a>
                            ': '') .'

    
                        </div>
                    </div>
                    ';
                })
                ->make(true);
            }else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    }
    //data function end


    //add_modal function start
    public function add_modal(){
        try{
            if( can("add_event") ){
                $locations = DB::select("SELECT id,name FROM locations WHERE type = 'City' AND is_active = true"); 
                return view("backend.modules.app_data_module.event.modals.add", compact('locations'));
            }
            else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    }
    //add_modal function end


    //add function start
    public function add(Request $request){
        try{
            if( can("add_event") ){
                $validator = Validator::make($request->all(),[
                    "position" => "required|integer|unique:events,position",
                    "title" => "required",
                    "description" => "required",
                    "image" => "required",
                    "location_id" => "required|exists:locations,id",
                    "event_location" => "required",
                    "event_organizer_location" => "required",
                    "address" => "required",
                    "date" => "required",
                    "time" => "required",
                ]);

                if( $validator->fails() ){
                    return response()->json([
                        'errors' => $validator->errors()
                    ],422);
                }
                else{
                    $event = new Event();

                    $event->position = $request->position;
                    $event->title = $request->title;
                    $event->description = $request->description;
                    $event->location_id = $request->location_id;
                    $event->event_location = $request->event_location;
                    $event->event_organizer_location = $request->event_organizer_location;
                    $event->address = $request->address;
                    $event->date = $request->date;
                    $event->time = $request->time;
                    $event->is_active = true;
                    $event->month = Carbon::now()->month;
                    $event->year = Carbon::now()->year;

                    if( $request->image ){
                        $image = $request->file('image');
                        $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                        $path = public_path('images/event/'.$img);
                        Image::make($image)->save($path);
                        $event->image = $img;
                    }

                    if( $event->save() ){
                        return response()->json([
                            'success' => 'New event created'
                        ],200);
                    }

                }

            }
            else{
                return response()->json([
                    'warning' => unauthorized()
                ],200);
            }
        }
        catch( Exception $e ){
            return response()->json([
                'warning' => $e->getMessage()
            ],200);
        }
    }
    //add function end


    //edit_modal function start
    public function edit_modal($id){
        try{
            if( can("edit_event") ){
                $id = decrypt($id);
                $locations = DB::select("SELECT id,name FROM locations WHERE type = 'City' AND is_active = true"); 
                $event = DB::select("SELECT * FROM events WHERE id = $id");

                if( isset($event[0]) ){
                    $event = $event[0];
                    return view("backend.modules.app_data_module.event.modals.edit", compact('locations','event'));
                }
                else{
                    return "No Data Found";
                }

            }
            else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    }
    //edit_modal function end


    //edit function start
    public function edit(Request $request, $id){
        try{
            if( can("edit_event") ){
                $id = decrypt($id);
                $validator = Validator::make($request->all(),[
                    "position" => "required|integer|unique:events,position,". $id,
                    "title" => "required",
                    "description" => "required",
                    "location_id" => "required|exists:locations,id",
                    "event_location" => "required",
                    "event_organizer_location" => "required",
                    "address" => "required",
                    "date" => "required",
                    "time" => "required",
                ]);

                if( $validator->fails() ){
                    return response()->json([
                        'errors' => $validator->errors()
                    ],422);
                }
                else{
                    $event = Event::find($id);

                    if( $event ){
                        $event->position = $request->position;
                        $event->title = $request->title;
                        $event->description = $request->description;
                        $event->location_id = $request->location_id;
                        $event->event_location = $request->event_location;
                        $event->event_organizer_location = $request->event_organizer_location;
                        $event->address = $request->address;
                        $event->date = $request->date;
                        $event->time = $request->time;
                        $event->is_active = $request->is_active;
    
                        if( $request->image ){
                            if( File::exists('images/event/'. $event->image) ){
                                File::delete('images/event/'. $event->image);
                            }
                            $image = $request->file('image');
                            $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                            $path = public_path('images/event/'.$img);
                            Image::make($image)->save($path);
                            $event->image = $img;
                        }
    
                        if( $event->save() ){
                            return response()->json([
                                'success' => 'New event created'
                            ],200);
                        }
                    }
                    else{
                        return response()->json([
                            'warning' => 'No event found'
                        ],200);
                    }
                    

                }

            }
            else{
                return response()->json([
                    'warning' => unauthorized()
                ],200);
            }
        }
        catch( Exception $e ){
            return response()->json([
                'warning' => $e->getMessage()
            ],200);
        }
    }
    //edit function end


    //delete_modal function start
    public function delete_modal($id){
        try{
            if( can("delete_event") ){
                $id = decrypt($id);
                $event = DB::select("SELECT * FROM events WHERE id = $id");

                if( isset($event[0]) ){
                    $event = $event[0];
                    return view("backend.modules.app_data_module.event.modals.delete", compact('event'));
                }
                else{
                    return "No Data Found";
                }

            }
            else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    }
    //delete_modal function end


     //delete function start
     public function delete($id){
        try{
            if( can("delete_event") ){
                $id = decrypt($id);

                $event = Event::find($id);

                if( $event ){

                    if( File::exists('images/event/'. $event->image) ){
                        File::delete('images/event/'. $event->image);
                    }

                    if( $event->delete() ){
                        return response()->json([
                            'success' => 'Event deleted'
                        ],200);
                    }
                }
                else{
                    return response()->json([
                        'warning' => 'No event found'
                    ],200);
                } 


            }
            else{
                return response()->json([
                    'warning' => unauthorized()
                ],200);
            }
        }
        catch( Exception $e ){
            return response()->json([
                'warning' => $e->getMessage()
            ],200);
        }
    }
    //delete function end
}
