<?php

namespace App\Http\Controllers\Backend\AppDataModule\Box;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    //index function start
    public function index(){
        try{
            if( can("boxes") ){
                
            }
            else{
                return view("errors.404");
            }
        }
        catch( Exception $e ){
            return back()->with('warning', $e->getMessage());
        }
    }
    //index function end
}
