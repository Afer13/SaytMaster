<?php

namespace App\Services;

use App\Models\Application;
use App\Models\ApplicationType;
use Illuminate\Http\Request;

class ApplicationService
{
    public static function getApplications(Request $request){
        $messages=Application::with('type')->latest();
        if($request->is_active){
            $messages=$messages->where('is_active',$request->is_active==1?1:0);
        }
        if($request->type_id){
            $messages=$messages->where('type_id',$request->type_id);
        }
        return $messages->paginate();
    }
    public static function getApplication($id){
        return Application::find($id);
    }

    public function addApplication(Request $request){
        $message=new Application();
        $message->name=$request->name;
        $message->surname=$request->surname;
        $message->email=$request->email;
        $message->phone_number=$request->phone_number;
        $message->type_id=$request->type_id;
        $message->company_name=$request->company_name;
        $message->message=$request->message;
        $message->ip=$request->ip();
        $message->save();
    }

    public function checkRequestLimit($ip){
        return Application::where('ip',$ip)->where('created_at','>',now()->subHours(24))->exists();
    }

    public function checkType($id){
        return ApplicationType::where('id',$id)->exists();
    }

    public static function getTypes(){
        return ApplicationType::orderBy('id')->get();
    }

    public static function activeStatusChange($id){
        $message=ApplicationService::getApplication($id);
        if($message){
            $message->is_active=!$message->is_active;
            $message->save();
        }
    }
}
