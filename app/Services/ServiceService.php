<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceService
{
    public static function getServices()
    {
        return Service::orderBy('id')->paginate();
    }
    public static function getService($id)
    {
        return Service::find($id);
    }
    public static function storeService(Request $request): void
    {
        $service = new Service();
        $service->title = $request->title;
        $service->content_short = $request->content_short;
        $service->content = $request->content;
        $service->icon = $request->icon;
        $service->slug = $request->slug;
        if ($request->hasFile('image')) {
            $service->image_url = $request->file('image')->store('services', 'public');
        }
        $service->save();
    }

    public static function updateService(Request $request, $id): void
    {
        $service = ServiceService::getService($id);
        if ($service) {
            $service->title = $request->title;
            $service->content_short = $request->content_short;
            $service->content = $request->content;
            $service->icon = $request->icon;
            $service->slug = $request->slug;
            if ($request->hasFile('image')) {
                $service->image_url = $request->file('image')->store('services', 'public');
            }
            $service->save();
        }
    }

    public static function destroyService($id): void
    {
        $service = ServiceService::getService($id);
        if($service){
            $service->delete();
        }
    }

    public static function activeStatusChange($id): void{
        $service=ServiceService::getService($id);
        if($service){
            $service->is_active=!$service->is_active;
            $service->save();
        }
    }
}
