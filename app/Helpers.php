<?php

//check user access permission function start

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

    //find root parent of user start
    function root($id){
        if( auth('web')->check() ){
            $count = 0;
            while( $count != -1 ){
                $user = User::find($id);
                if( $user->parent_id == 0 ){
                    $id = $user->id;
                    $count = -1;
                }else{
                    $id = $user->parent->id;
                    $count++;
                }
            }
            return $user = User::find($id);
        }
        else{
            return $user = SuperAdmin::find($id);
        }
       
    } 
    //find root parent of user end 


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