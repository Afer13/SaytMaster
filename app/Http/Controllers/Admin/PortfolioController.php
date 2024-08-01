<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioRequest;
use App\Services\PortfolioService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios=PortfolioService::getPortfolios();
        return view('admin.portfolios.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request)
    {
        PortfolioService::storePortfolio($request);
        return redirect()->route('portfolios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=PortfolioService::getPortfolio($id);
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolio=PortfolioService::getPortfolio($id);
        return view('admin.portfolios.edit',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, string $id)
    {
        PortfolioService::updatePortfolio($request,$id);
        return redirect()->route('portfolios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PortfolioService::destroyPortfolio($id);
        return redirect()->route('portfolios.index');
    }


    public function activeStatusChange($id){
        PortfolioService::activeStatusChange($id);
        return response()->json();
    }
}
