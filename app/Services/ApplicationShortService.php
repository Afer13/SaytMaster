<?php

namespace App\Services;

use App\Models\ApplicationShort;
use Illuminate\Http\Request;

class ApplicationShortService
{
    public static function getApplicationShorts(Request $request){
        $messages=ApplicationShort::latest();
        if($request->is_active){
            $messages=$messages->where('is_active',$request->is_active==1?1:0);
        }
        return $messages->paginate();
    }
    public static function getApplicationShort($id){
        return ApplicationShort::find($id);
    }

    public function addApplicationShort(Request $request){
        $message=new ApplicationShort();
        $message->phone_number=$request->phone_number;
        $message->ip=$request->ip();
        $message->save();
    }

    public function checkRequestLimit($ip){
        return ApplicationShort::where('ip',$ip)->where('created_at','>',now()->subHours(24))->exists();
    }
   
    public static function activeStatusChange($id){
        $message=ApplicationShortService::getApplicationShort($id);
        if($message){
            $message->is_active=!$message->is_active;
            $message->save();
        }
    }
}
