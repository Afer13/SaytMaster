<?php

namespace App\Services;

use App\Models\ContactMessage;
use App\Models\MessageType;
use Illuminate\Http\Request;

class ContactService
{
    public static function getMessages(Request $request){
        $messages=ContactMessage::latest();
        if($request->is_active){
            $messages=$messages->where('is_active',$request->is_active==1?1:0);
        }
        return $messages->paginate();
    }
    public static function getMessage($id){
        return ContactMessage::find($id);
    }

    public static function addMessage(Request $request){
        $message=new ContactMessage();
        $message->name=$request->name;
        $message->email=$request->email;
        $message->subject=$request->subject;
        $message->message=$request->message;
        $message->ip=$request->ip();
        $message->save();
    }

    public function checkRequestLimit($ip){
        return ContactMessage::where('ip',$ip)->where('created_at','>',now()->subHours(24))->exists();
    }
    public function activeStatusChange($id){
        $message=ContactService::getMessage($id);
        if($message){
            $message->is_active=!$message->is_active;
            $message->save();
        }
    }
}
