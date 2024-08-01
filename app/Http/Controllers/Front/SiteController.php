<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\ApplicationShortRequest;
use App\Http\Requests\ContactRequest;
use App\Services\AboutService;
use App\Services\ApplicationService;
use App\Services\ApplicationShortService;
use App\Services\ContactService;
use App\Services\PortfolioService;
use App\Services\PostService;
use App\Services\ServiceService;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $about=AboutService::getAbout();
        $services=ServiceService::getServices();
        $portfolios=PortfolioService::getPortfoliosIndex();
        return view('front.index',compact('about','services','portfolios'));
    }
    public function about(){
        $about=AboutService::getAbout();
        return view('front.about',compact('about'));
    }

    public function services(){
        $services=ServiceService::getServices();
        return view('front.services',compact('services'));
    }
    public function portfolios(){
        $portfolios=PortfolioService::getPortfolios();
        return view('front.portfolios',compact('portfolios'));
    }

    public function posts(){
        $posts=PostService::getPosts();
        return view('front.posts',compact('posts'));
    }

    public function contact_us(){
        return view('front.contact');
    }

    public function contact_post(ContactRequest $request,ContactService $contactService){
        if($contactService->checkRequestLimit($request->ip())){
            return back()->with('warning','Gün ərzində 1 dəfə müraciət edə bilərsiniz!');
        }
        $contactService->addMessage($request);
        return back()->with('success','Mesajınız qeydə alndı. Yaxın zamanda sizinlə əlaqə saxlanacaq.');
    }

    public function application(){
        $types=ApplicationService::getTypes();
        return view('front.application',compact('types'));
    }
    public function application_post(ApplicationRequest $request,ApplicationService $applicationService){
        if($applicationService->checkRequestLimit($request->ip())){
            return back()->with('warning','Gün ərzində 1 dəfə müraciət edə bilərsiniz!');
        }
        $applicationService->addApplication($request);
        return back()->with('success','Məlumat qeydə alndı. Yaxın zamanda sizinlə əlaqə saxlanacaq.');
    }

    public function application_short_post(ApplicationShortRequest $request,ApplicationShortService $applicationShortService){
        if($applicationShortService->checkRequestLimit($request->ip())){
            return back()->with('warning','Gün ərzində 1 dəfə müraciət edə bilərsiniz!');
        }
        $applicationShortService->addApplicationShort($request);
        return back()->with('success','Məlumat qeydə alndı. Yaxın zamanda sizinlə əlaqə saxlanacaq.');
    }

}
