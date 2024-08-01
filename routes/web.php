<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\ApplicationShortController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Front\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/admin/login',[AuthController::class,'loginPage'])->name('admin.login');
Route::post('/admin/login/post',[AuthController::class,'login'])->name('admin.login.post');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/admin/logout',[AuthController::class,'logout'])->name('admin.logout');

    Route::get('/blank',[TestController::class,'blank'])->name('admin.blank');
    Route::get('/setting',[SettingController::class,'index'])->name('admin.setting.index');
    Route::post('/setting/update',[SettingController::class,'updateSetting'])->name('admin.setting.update');

    Route::get('/about',[AboutController::class,'index'])->name('admin.about.index');
    Route::post('/about/update',[AboutController::class,'updateAbout'])->name('admin.about.update');

    Route::resource('services',ServiceController::class);
    Route::put('/services/{id}/active-status-change',[ServiceController::class,'activeStatusChange']);
    
    Route::resource('posts',PostController::class);
    Route::put('/posts/{id}/active-status-change',[PostController::class,'activeStatusChange']);

    Route::resource('portfolios',PortfolioController::class);
    Route::put('/portfolios/{id}/active-status-change',[PortfolioController::class,'activeStatusChange']);

    Route::get('/contact-messages',[ContactController::class,'index']);
    Route::put('/contact-messages/{id}/active-status-change',[ContactController::class,'activeStatusChange']);

    Route::get('/applications',[ApplicationController::class,'index']);
    Route::put('/applications/{id}/active-status-change',[ApplicationController::class,'activeStatusChange']);

    Route::get('/application-shorts',[ApplicationShortController::class,'index']);
    Route::put('/application-shorts/{id}/active-status-change',[ApplicationShortController::class,'activeStatusChange']);
});


Route::group([],function(){
    Route::get('/',[SiteController::class,'index'])->name('home');
    Route::get('/about-us',[SiteController::class,'about'])->name('about');
    Route::get('/services',[SiteController::class,'services'])->name('services');
    Route::get('/portfolios',[SiteController::class,'portfolios'])->name('portfolios');
    Route::get('/blog',[SiteController::class,'posts'])->name('posts');
    Route::get('/contact-us',[SiteController::class,'contact_us'])->name('contact');
    Route::post('/contact/post',[SiteController::class,'contact_post'])->name('contact.post');
    Route::get('/application',[SiteController::class,'application'])->name('application');
    Route::post('/application/post',[SiteController::class,'application_post'])->name('application.post');
    Route::post('/application-short/post',[SiteController::class,'application_short_post'])->name('application-short.post');
});
