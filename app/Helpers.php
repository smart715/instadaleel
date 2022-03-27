<?php

//check user access permission function start

use App\Models\AppDataModule\Category;
use App\Models\UserModule\SuperAdmin;
use App\Models\UserModule\User;

function can($can){
        if( auth('web')->check() ){
            foreach( auth('web')->user()->role->permission as $permission ){
                if( $permission->key == $can ){
                    return true;
                }
            }
            return false;
        }
        return back();
        
    }
    //check user access permission function end

    //find root parent of category start
    function root($id){
        $count = 0;
        $data = [];
        $i =0;
        while( $count != -1 ){
            $category = Category::find($id);
            if( $category->category_id == 0 ){
                $id = $category->id;
                $count = -1;
                $i += 1;
                array_push($data,[
                    'id' => $i,
                    'data' => $category 
                ]);
            }
            else{
                $id = $category->parent->id;
                $i += 1;
                array_push($data,[
                    'id' => $i,
                    'data' => $category 
                ]);
                $count++;
            }
        }
        return $data;
       
    } 
    //find root parent of category end 


    //unauthorized text start
    function unauthorized(){
        return "You are not authorized for this";
    }
    //unauthorized text end


    //mail from start
    function mail_from(){
        return "info@emicon.tech";
    }
    //mail from end


?>