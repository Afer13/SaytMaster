<?php

namespace App\Services;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutService
{
    public static function getAbout(){
        return AboutUs::first();
    }
    public function updateAbout(Request $request){
        $about=AboutUs::first();
        if(!$about){
            $about=new AboutUs;
        }
        $about->title=$request->title;
        $about->content_short=$request->content_short;
        $about->content=$request->content;
        $about->items=json_encode($request->items);
        if($request->hasFile('image')){
            $about->image_url=$request->file('image')->store('about','public');
        }
        $about->save();
    }
}
