<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services=ServiceService::getServices();
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        ServiceService::storeService($request);
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service=ServiceService::getService($id);
        return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service=ServiceService::getService($id);
        return view('admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        ServiceService::updateService($request,$id);
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ServiceService::destroyService($id);
        return redirect()->route('services.index');
    }

    public function activeStatusChange($id){
        ServiceService::activeStatusChange($id);
        return response()->json();
    }
}
