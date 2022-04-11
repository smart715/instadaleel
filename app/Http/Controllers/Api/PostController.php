<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityModule\Post\PostResource;
use App\Http\Resources\CommunityModule\Post\PostResourceCollection;
use App\Http\Resources\CommunityModule\PostComment\PostCommentResource;
use App\Models\CommunityModule\CommentLike;
use App\Models\CommunityModule\Post;
use App\Models\CommunityModule\PostLikeComment;
use Carbon\Carbon;
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

                $post->month = Carbon::now()->month;
                $post->year = Carbon::now()->year;

                //image insert start
                $data = [];
                if( $request['images'] ){
                    $i = 1;
                    foreach( $request['images'] as $image ){
                        $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();

                        $location = public_path('images/post/'.$img);
                        Image::make($image)->save($location);
                        array_push($data,[
                            'id' => $i,
                            'image' => $img
                        ]);
                        $i++;
                    }
                    $post->image = json_encode($data);
                }
                else{
                    $post->image = null;
                }
                //image insert end

                if( $post->save() ){
                    return response()->json([
                        'status' => 'success',
                        'data' => new PostResource($post)
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


    //delete_post_image function start
    public function delete_post_image(Request $request){
        try{    
            $validator = Validator::make($request->all(), [
                "post_id" => "required|integer|exists:posts,id",
                "image_id" => "required|integer",
                "customer_id" => "required|integer|exists:customers,id",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ],200);
            }
            else{
                $post = Post::where("id", $request->post_id)->first();

                $post_image_exists = collect(json_decode($post->image))->where("id",$request->image_id)->first();

                if( $post_image_exists ){
                    $data = [];
                    $i = 1;

                    foreach( json_decode($post->image) as $post_image ){
                        if( $post_image->id != $post_image_exists->id ){
                            array_push($data,[
                                'id' => $i,
                                'image' => $post_image->image
                            ]);
                            $i++;
                        }
                    }

                    if( File::exists('images/post/'. $post_image_exists->image) ){
                        File::delete('images/post/'. $post_image_exists->image);
                    }

                    $post->image = json_encode($data);

                    if( $post->save() ){
                        return response()->json([
                            'status' => 'success',
                            'data' => new PostResource($post)
                        ],200);
                    }

                }
                else{
                    return response()->json([
                        'status' => 'error',
                        'data' => 'Invalid image id'
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
    //delete_post_image function end


    //update_post function start
    public function update_post(Request $request){
        try{    
            $validator = Validator::make($request->all(), [
                "post_id" => "required|integer|exists:posts,id",
                "customer_id" => "required|integer|exists:customers,id",
                "description" => "required",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ],200);
            }
            else{
                $post = Post::where("id", $request->post_id)->first();
                $data = [];
                $post_images = collect(json_decode($post->image));
                $i = 1;

                if( $post->image ){
                    foreach( $post_images as $post_image ){
                        array_push($data,[
                            'id' => $post_image->id,
                            'image' => $post_image->image
                        ]);
                        $i = $post_image->id + 1;
                    }
                }
                

                if( $request['images'] ){
                    foreach( $request['images'] as $image ){
                        $img = time().Str::random(12).'.'.$image->getClientOriginalExtension();

                        $location = public_path('images/post/'.$img);
                        Image::make($image)->save($location);
                        array_push($data,[
                            'id' => $i,
                            'image' => $img
                        ]);
                        $i++;
                    }
                }

                $post->description = $request->description; 
                $post->image = json_encode($data);

                if( $post->save() ){
                    return response()->json([
                        'status' => 'success',
                        'data' => new PostResource($post)
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
    //update_post function end


    //delete_post function start
    public function delete_post(Request $request){
        try{    
            $validator = Validator::make($request->all(), [
                "post_id" => "required|integer|exists:posts,id",
                "customer_id" => "required|integer|exists:customers,id",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors()
                ],200);
            }
            else{
                $post = Post::where("id", $request->post_id)->first();
                $post_images = collect(json_decode($post->image));

                if( $post->image ){
                    foreach( $post_images as $post_image ){
                        if( File::exists('images/post/'. $post_image->image) ){
                            File::delete('images/post/'. $post_image->image);
                        }
                    }
                }

                if( $post->delete() ){
                    return response()->json([
                        'status' => 'success',
                        'data' => 'Post deleted'
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
    //delete_post function end

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
                                    ->select("customer_id","image","description","total_like","total_comment","id","created_at")
                                    ->with('customer_data')
                                    ->orderBy("id","desc")
                                    ->paginate(10);

                return response()->json([
                    'status' => 'success',
                    'data' => $post
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


    //latest_post function start
    public function latest_post(Request $request){
        try{
            $post = Post::where("is_approved", true)
            ->where("is_shown", true)
            ->select("customer_id","image","description","total_like","total_comment","id","created_at")
            ->with('customer_data')
            ->orderBy("id","desc")
            ->take(10)
            ->get();

            return response()->json([
            'status' => 'success',
            'data' => $post
            ],200);
        }
        catch( Exception $e ){
            return response()->json([
                'status' => 'error',
                'data' => $e->getMessage()
            ],200);
        }
    } 
    //latest_post function end


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
                    $post_like->image = json_encode($data);
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


    //comment_like function start
    public function comment_like(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                "customer_id" => "required|integer|exists:customers,id",
                "post_like_comment_id" => "required|integer|exists:post_like_comments,id",
            ]);

            if( $validator->fails() ){
                return response()->json([
                    'status' => 'error',
                    'data' =>$validator->errors()
                ],200);
            }
            else{
                
                $data = CommentLike::where("customer_id",$request->customer_id)->where("post_like_comment_id",$request->post_like_comment_id)->first();

                if( $data ){
    
                    if( $data->delete() ){

                        $count = CommentLike::where("post_like_comment_id", $request->post_like_comment_id)->select("id")->count();
    
                        return response()->json([
                            'status' => 'success',
                            'data' => 'Unlike submitted',
                            'total_like' => $count,
                        ],200);
    
                    }
                }
                else{
                    $comment_link = new CommentLike();

                    $comment_link->customer_id = $request->customer_id;
                    $comment_link->post_like_comment_id = $request->post_like_comment_id;
    
                    if( $comment_link->save() ){
                        $count = CommentLike::where("post_like_comment_id", $request->post_like_comment_id)->select("id")->count();
    
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
    //comment_like function end
}
