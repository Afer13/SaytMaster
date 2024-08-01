<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request){
        $messages=ContactService::getMessages($request);
        return view('admin.contact-messages.index',compact('messages'));
    }
    public function activeStatusChange($id){
        ContactService::activeStatusChange($id);
    }
}
