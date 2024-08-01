<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApplicationShortService;
use Illuminate\Http\Request;

class ApplicationShortController extends Controller
{
    public function index(Request $request){
        $messages=ApplicationShortService::getApplicationShorts($request);
        return view('admin.applications.index_short',compact('messages'));
    }
    public function activeStatusChange($id){
        ApplicationShortService::activeStatusChange($id);
    }
}
