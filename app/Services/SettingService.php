<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingService
{
    public static function getSetting(){
        return Setting::first();
    }
    public function updateSetting(Request $request): void{
        $setting=Setting::first();
        if(!$setting){
            $setting=new Setting();
        }
        if($request->hasFile('logo')){
            $setting->logo_url=$request->file('logo')->store('logos','public');
        }
        if($request->hasFile('logo_2')){
            $setting->logo_2_url=$request->file('logo_2')->store('logos','public');
        }
        if($request->hasFile('favicon')){
            $setting->favicon_url=$request->file('favicon')->store('logos','public');
        }
        $setting->email=$request->email;
        $setting->phone_number=$request->phone_number;
        $setting->address=$request->address;
        $setting->facebook=$request->facebook;
        $setting->instagram=$request->instagram;
        $setting->twitter=$request->twitter;
        $setting->youtube=$request->youtube;
        $setting->whatsapp=$request->whatsapp;
        $setting->save();
    }
}
