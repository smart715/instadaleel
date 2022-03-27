<?php

namespace App\Http\Controllers\Backend\AppDataModule\Category;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{

    //index function start
    public function index(){
        try{
            if( can("all_category") ){
                return view("backend.modules.app_data_module.category.index");
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
            if( can('all_category') ){
                $category = Category::orderBy("position","asc")->select("id","position","name","icon","is_active","category_id")->get();
    
                return DataTables::of($category)
                ->rawColumns(['action', 'is_active','icon','parent'])
                ->editColumn('icon', function(Category $category){
                    $src = asset("images/category/".$category->icon);
                    return "
                        <img src='$src' width='50px'>
                    ";
                })
                
                ->editColumn('is_active', function (Category $category) {
                    if ($category->is_active == true) {
                        return '<p class="badge badge-success">Active</p>';
                    } else {
                        return '<p class="badge badge-danger">Inactive</p>';
                    }
                })

                ->editColumn('parent', function (Category $category) {
                    if ( $category->category_id == null ) {
                        return '<p class="badge badge-success">Parent Category</p>';
                    } else {
                        $parent = $category->parent->name;
                        return '<p class="badge badge-danger">'. $parent .'</p>';
                    }
                })

                ->addColumn('action', function (Category $category) {
                    return '
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown'.$category->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown'.$category->id.'">
    
                            '.( can("edit_banner") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('banner.edit.modal',encrypt($category->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            ': '') .'

                            '.( can("delete_banner") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('banner.delete.modal',encrypt($category->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                <i class="fas fa-trash"></i>
                                Delete
                            </a>
                            ': '') .'

                            '.( can("view_banner") ? '
                            <a class="dropdown-item" href="#" data-content="'.route('banner.view.modal',encrypt($category->id)).'" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
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
            if( can("add_category") ){
                $categories = Category::where("is_active",true)->orderBy("id","desc")->select("id","name","category_id")->get();
                return view("backend.modules.app_data_module.category.modals.add", compact("categories"));
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
            if( can("add_category") ){
                $validator = Validator::make($request->all(), [
                    "position" => "required|integer|min:1|unique:categories,position",
                    "name" => "required|unique:categories,name",
                    // "icon" => "required|mimes:jpg,png,jpeg,webp,svg|dimensions:width=50,height=50",
                    "icon" => "required|mimes:jpg,png,jpeg,webp,svg",
                    "category_id" => "required"
                ]);

                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()],422);
                }
                else{
                    $category =  new Category();

                    $category->position = $request->position;
                    $category->name = $request->name;
                    $category->slug = Str::slug($request->name);
                    $category->is_active = true;

                    if( $request->icon ){
                        $image = $request->file('icon');
                        $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();
                        $location = public_path('images/category/'.$img);
                        Image::make($image)->save($location);
                        $category->icon = $img;
                    }

                    if( $request->category_id == "NoParent" ){
                        $category->category_id = null;
                    }
                    else{
                        $category->category_id = $request->category_id;
                    }

                    if( $category->save() ){
                        return response()->json(['success' => 'New category created'],200);
                    }
                    

                }
            }
            else{
                return response()->json(['warning' => unauthorized()],200);
            }
        }
        catch( Exception $e ){
            return response()->json(['error' => $e->getMessage()],200);
        }
    }
    //add function end

}
