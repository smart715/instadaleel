<?php

namespace App\Http\Controllers\Backend\AppDataModule\Event;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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
                
                // $event = Event::orderBy("position","asc")->select("id","position","image","is_active","title","is_approved")->get();
                $event = DB::select("SELECT id,position,image,is_active,title,is_approved FROM events ORDER BY position ASC");
    
                return DataTables::of($event)
                ->rawColumns(['action', 'is_active','image'])
                ->editColumn('image', function(Event $event){
                    $src = asset("images/event/".$event->image);
                    return "
                        <img src='$src' width='50px'>
                    ";
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
    
                            '.( can("edit_country") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('country.edit.modal',encrypt($event->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            ': '') .'

                            '.( can("view_country") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('country.view.modal',encrypt($event->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-eye"></i>
                                View
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
}
