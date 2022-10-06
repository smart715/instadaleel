<?php

namespace App\Http\Controllers\Backend\SettingsModule;

use App\Http\Controllers\Controller;
use App\Models\SettingsModule\Coins;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CoinController extends Controller
{
    //index function start
    public function index()
    {
        if (can("app_info")) {
            $coins = Coins::all();
            return view("backend.modules.setting_module.coin.index", compact("coins"));
        } else {
            return view("errors.403");
        }
    }
    //index function end

    //update function start
    public function update(Request $request)
    {
        try {
            $coin = Coins::find($request->id);
            $coin->amount = $request->amount;
            if ($coin->save()) {
                return response()->json(['success' => 'App Info Updated'], 200);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 200);
        }
    }
    //update function end
}
