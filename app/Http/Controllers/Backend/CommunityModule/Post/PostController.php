<?php

namespace App\Http\Controllers\Backend\CommunityModule\Post;

use App\Http\Controllers\Controller;
use App\Models\CommunityModule\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //index function start
    public function index(Request $request){
        try{
            if( can("all_post") ){

                $is_approved = $request->is_approved;
                $is_shown = $request->is_shown;
                $date = $request->date;
                $search = $request->search;
                $query = Post::orderBy("id","desc")->select("id","is_approved","is_shown","total_like","total_comment","created_at","description");

                if( $request->is_approved == '1' ){
                    $query->where("is_approved", true);
                }  
                if( $request->is_approved == '0' ){
                    $query->where("is_approved", false);
                }  


                if( $request->is_shown == '1' ){
                    $query->where("is_shown", true);
                }  
                if( $request->is_shown == '0' ){
                    $query->where("is_shown", false);
                }   
                
                if( $request->date ){ 
                    $query->whereDate("created_at",$date);                    
                }

                if( $request->search ){ 
                    $query->where("description","LIKE","%$search%");                    
                }

                $posts = $query->paginate(10);

                return view("backend.modules.community_module.post.index", compact('posts','is_approved','is_shown','date','search'));
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


    //edit_modal function start
    public function edit_modal($id){
        try{
            if( can("edit_post") ){
                $post = Post::where("id",decrypt($id))->first();
                return view("backend.modules.community_module.post.modals.edit", compact('post'));
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
    public function edit($id, Request $request){
        try{
            if( can("edit_post") ){
                $valdiator = Validator::make($request->all(),[
                    "is_approved" => "required",
                    "is_shown" => "required",
                ]);

                if( $valdiator->fails() ){
                    return response()->json(['errors' => $valdiator->errors()],422);
                }
                else{
                    $post = Post::where("id",decrypt($id))->first();

                    if( $post->save() ){
                        $post->is_approved = $request->is_approved;
                        $post->is_shown = $request->is_shown;
                        
                        if( $post->save() ){
                            return response()->json(['status' => 'success','location_reload' => 'Post Updated'],200);
                        }
                    }
                    else{
                        return response()->json(['warning' => 'No post found'],200);
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
    //edit function end


    //delete_modal function start
    public function delete_modal($id){
        try{
            if( can("delete_post") ){
                $id = decrypt($id);

                $post = DB::select("SELECT id,description FROM posts WHERE id = $id");

                if( isset($post[0]) ){
                    $post = $post[0];
                    return view("backend.modules.community_module.post.modals.delete", compact("post"));
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
            if( can("delete_post") ){
                $id = decrypt($id);
                
                $post = Post::find($id);

                if( $post ){

                    if( File::exists('images/post/'. $post->image) ){
                        File::delete('images/post/'. $post->image);
                    }

                    if( $post->delete() ){
                        return response()->json([
                            'status' => 'success',
                            'location_reload' => 'Post deleted'
                        ],200);
                    }
                }
                else{
                    return response()->json(['warning' => 'No data found'],200);
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
    //delete function end


    //view_modal function start
    public function view_modal($id){
        try{
            if( can("view_post") ){
                $post = Post::where("id",decrypt($id))->select("customer_id","description","image","created_at","updated_at")->first();

                return view("backend.modules.community_module.post.modals.view", compact('post'));
            }
            else{
                return unauthorized();
            }
        }
        catch( Exception $e ){
            return $e->getMessage();
        }
    }
    //view_modal function end
}
