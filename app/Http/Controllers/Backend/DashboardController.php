<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AppDataModule\Business;
use App\Models\AppDataModule\Category;
use App\Models\CommunityModule\Post;
use App\Models\CommunityModule\PostLikeComment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if( auth('super_admin')->check() || auth('web')->check() ){

            $category = Category::select("id")->count();
            $posts = Post::select("id")->count();
            $post_like_comment = PostLikeComment::select("type")->get();


            return view('backend.dashboard', compact(
                'category', 'posts', 'post_like_comment'
            ));
        }
        else{
            return view("errors.404");
        }
    }


    //post_history_chart function start
    public function post_history_chart(){
        
        $month = Carbon::now()->month;
        $this_month = Carbon::now()->month - 1;
        $year = Carbon::now()->year;

        $done = 1;
        $data = [];

        for( $i = 0 ; $i < 6 ; $i++ ){

                
                $post = Post::where("year",$year)->where("month",$month)->select("id")->count();
                
                array_push($data,
                    [
                        "post" => $post,
                        "time" => Carbon::create()->day(1)->month($month)->format('M') .' '. $year,
                    ]
                );
                
                $month--;

                if( $i == $this_month && $month < 6 ){
                    $year = $year - 1;
                }
                
                if( $month == 0 ){
                    $month = 12;
                }
        }

        return response()->json(['data' => $data], 200);
    }
    //post_history_chart function end


    //business_history_chart function start
    public function business_history_chart(){
        
        $month = Carbon::now()->month;
        $this_month = Carbon::now()->month - 1;
        $year = Carbon::now()->year;

        $done = 1;
        $data = [];

        for( $i = 0 ; $i < 6 ; $i++ ){

                
                $business = Business::where("year",$year)->where("month",$month)->select("id")->count();
                
                array_push($data,
                    [
                        "business" => $business,
                        "time" => Carbon::create()->day(1)->month($month)->format('M') .' '. $year,
                    ]
                );
                
                $month--;

                if( $i == $this_month && $month < 6 ){
                    $year = $year - 1;
                }
                
                if( $month == 0 ){
                    $month = 12;
                }
        }

        return response()->json(['data' => $data], 200);
    }
    //business_history_chart function end


}