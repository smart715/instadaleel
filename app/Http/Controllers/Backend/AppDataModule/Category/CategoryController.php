<?php

namespace App\Http\Controllers\Backend\AppDataModule\Category;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function data($id){
        try{
            if( can('all_category') ){

                if( $id == "parent" ){
                    $category = Category::orderBy("position","asc")
                    ->where("category_id", null)
                    ->select("id","position","name","icon","is_active","category_id")->get();
                }
                else{
                    $category = Category::orderBy("position","asc")
                    ->where("category_id", $id)
                    ->select("id","position","name","icon","is_active","category_id")->get();
                }
    
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

                            '.( can("all_category") ? '
                            <a class="dropdown-item" href="'.route('get.subcategory',encrypt($category->id)).'" class="btn btn-outline-dark">
                                <i class="fas fa-plus"></i>
                                Sub Category
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
    public function add_modal($id){
        try{
            if( can("add_category") ){
                if( $id == 'parent' ){
                    return view("backend.modules.app_data_module.category.modals.add");
                }
                else{
                    $category = Category::where("id", $id)->select("id","name")->first();
                    return view("backend.modules.app_data_module.category.modals.add", compact('category'));
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
    //add_modal function end


    //add function start
    public function add(Request $request){
        try{
            if( can("add_category") ){
                $validator = Validator::make($request->all(), [
                    "position" => "required|integer|min:1",
                    "name" => "required|unique:categories,name",
                    // "icon" => "required|mimes:jpg,png,jpeg,webp,svg|dimensions:width=50,height=50",
                    "icon" => "required|mimes:jpg,png,jpeg,webp,svg",
                    "category_id" => "required"
                ]);

                if( $validator->fails() ){
                    return response()->json(['errors' => $validator->errors()],422);
                }
                else{

                    if( $request->category_id == "NoParent" ){
                        if( Category::where("position", $request->position)->where("category_id", null)->first() ){
                            return response()->json(['warning' => 'Position already taken.'],200);
                        }
                    }
                    else{
                        if( Category::where("position", $request->position)->where("category_id", $request->category_id)->first() ){
                            return response()->json(['warning' => 'Position already taken.'],200);
                        }
                    }

                    
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


    //get_sub_category function start
    public function get_sub_category($id){
        try{
            if( can("all_category") ){
                $category = Category::where("id", decrypt($id))->select("id","name","category_id")->first();
                if( $category ){
                    $roots = root($category->id);
                    $sub_categories = Category::where("category_id", $category->id)->select("id","name","category_id")->get();

                    return view("backend.modules.app_data_module.category.sub_category", compact('sub_categories','category','roots'));
                }
                else{
                    return back()->with('warning','No category found');
                }

            }
            else{
                return view("errors.403");
            }
        }
        catch( Exception $e ){
            return back()->with('warning', $e->getMessage());
        }
    }
    //get_sub_category function end
}
