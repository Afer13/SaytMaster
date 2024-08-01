<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(public SettingService $settingService){}

    public function index(){
        $setting=$this->settingService->getSetting();
        return view('admin.setting.setting',compact('setting'));
    }

    public function updateSetting(SettingRequest $request){
        $this->settingService->updateSetting($request);
        return back()->with('success','Successful operation!');
    }
}
