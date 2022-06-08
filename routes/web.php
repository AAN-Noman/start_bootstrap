<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\StoryController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\TeamMemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name("frontend.")->group(function(){
    Route::get('/', [FrontendController::class, 'index'])->name('home');
});

Auth::routes();

Route::name("backend.")->group(function(){
    Route::get('/dashboard', [BackendController::class, 'index'])->name('home');
    Route::resource('/banner', BannerController::class)->except(["show"]);
    Route::resource('/services', ServicesController::class)->except(["show"]);
    Route::resource('/logo', LogoController::class);
    Route::resource('/portfolio', PortfolioController::class)->except(["show"]);
    Route::resource('/about', AboutController::class)->except(["show"]);
    Route::resource('/story', StoryController::class)->except(["show"]);
    Route::resource('/team', TeamController::class)->except(["show"]);
    Route::resource('/teamMember', TeamMemberController::class)->except(["show"]);
});
