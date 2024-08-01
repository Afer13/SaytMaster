<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request){
        $messages=ApplicationService::getApplications($request);
        $types=ApplicationService::getTypes();
        return view('admin.applications.index',compact('messages','types'));
    }
    public function activeStatusChange($id){
        ApplicationService::activeStatusChange($id);
    }
}
