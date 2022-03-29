<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CommunityModule\Post;
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
                $post->is_approved = false;
                $post->is_shown = false;
                $post->total_like = false;
                $post->total_comment = false;

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
}
