<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityModule\Post\PostResourceCollection;
use App\Http\Resources\CommunityModule\PostComment\PostCommentResource;
use App\Models\CommunityModule\Post;
use App\Models\CommunityModule\PostLikeComment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //add_post function start
    public function add_post(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                "customer_id" => "required|integer|exists:customers,id",
                "description" => "required",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' =>$validator->errors()
                ],200);
            }
            else{
                $post = new Post();

                $post->customer_id = $request->customer_id;
                $post->description = $request->description;
                $post->is_approved = true;
                $post->is_shown = true;
                $post->total_like = 0;
                $post->total_comment = 0;

                //image insert start
                $data = [];
                if( $request['images'] ){
                    foreach( $request['images'] as $image ){
                        $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();

                        $location = public_path('images/post/'.$img);
                        Image::make($image)->save($location);
                        array_push($data,[
                            'image' => $img
                        ]);
                    }
                    $post->image = serialize($data);
                }
                else{
                    $post->image = null;
                }

                if( $post->save() ){
                    return response()->json([
                        'status' => 'success',
                        'data' => $post
                    ],200);
                }

            }

        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //add_post function end


    //get_post function start
    public function get_post(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                "customer_id" => "required|integer|exists:customers,id",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' =>$validator->errors()
                ],200);
            }
            else{
                
                $post = Post::where("customer_id", $request->customer_id)
                                    ->where("is_approved", true)
                                    ->where("is_shown", true)
                                    ->select("customer_id","image","description","total_like","total_comment","id")
                                    ->orderBy("id","desc")
                                    ->get();

                return response()->json([
                    'status' => 'success',
                    'data' => new PostResourceCollection($post)
                ],200);

            }

        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //get_post function end


    //post_like function start
    public function post_like(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                "customer_id" => "required|integer|exists:customers,id",
                "post_id" => "required|integer|exists:posts,id",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' =>$validator->errors()
                ],200);
            }
            else{
                
                $data = PostLikeComment::where("customer_id",$request->customer_id)->where("post_id",$request->post_id)->first();

                if( $data ){
    
                    if( $data->delete() ){
                        $count = PostLikeComment::where("post_id", $request->post_id)->where("type","Like")->select("id")->count();
    
                        $post = Post::where("id",$request->post_id)->first();
    
                        if( $post ){
                            $post->total_like = $count;
                            $post->save();
                        }
    
                        return response()->json([
                            'status' => 'success',
                            'data' => 'Unlike submitted',
                            'total_like' => $count,
                        ],200);
    
                    }
                }
                else{
                    $post_like = new PostLikeComment();

                    $post_like->customer_id = $request->customer_id;
                    $post_like->post_id = $request->post_id;
                    $post_like->type = "Like";
    
                    if( $post_like->save() ){
                        $count = PostLikeComment::where("post_id", $request->post_id)->where("type","Like")->select("id")->count();
    
                        $post = Post::where("id",$request->post_id)->first();
    
                        if( $post ){
                            $post->total_like = $count;
                            $post->save();
                        }
    
                        return response()->json([
                            'status' => 'success',
                            'data' => 'Like submitted',
                            'total_like' => $count,
                        ],200);
    
                    }
                }

            }

        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //post_like function end


    //post_comment function start
    public function post_comment(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                "customer_id" => "required|integer|exists:customers,id",
                "post_id" => "required|integer|exists:posts,id",
                "comment" => "required",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' =>$validator->errors()
                ],200);
            }
            else{
                
                
                $post_like = new PostLikeComment();

                $post_like->customer_id = $request->customer_id;
                $post_like->post_id = $request->post_id;
                $post_like->comment = $request->comment;

                //image insert start
                $data = [];
                if( $request['images'] ){
                    foreach( $request['images'] as $image ){
                        $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();

                        $location = public_path('images/post/'.$img);
                        Image::make($image)->save($location);
                        array_push($data,[
                            'image' => $img
                        ]);
                    }
                    $post_like->image = serialize($data);
                }
                else{
                    $post_like->image = null;
                }

                $post_like->type = "Comment";

                if( $post_like->save() ){

                    $count = PostLikeComment::where("post_id", $request->post_id)->where("type","Comment")->select("id")->count();

                    $post = Post::where("id",$request->post_id)->first();

                    if( $post ){
                        $post->total_comment = $count;
                        $post->save();
                    }

                    return response()->json([
                        'status' => 'success',
                        'data' => new PostCommentResource($post_like),
                        'total_comment' => $count,
                    ],200);

                }
                

            }

        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    }
    //post_comment function end
}
