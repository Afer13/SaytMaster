<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutRequest;
use App\Services\AboutService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(public AboutService $aboutService){}
    public function index(){
        $about=$this->aboutService->getAbout();
        return view('admin.about.index',compact('about'));
    }
    public function updateAbout(AboutRequest $request){
        $this->aboutService->updateAbout($request);
        return back()->with('success','Successful operation!');
    }
}
