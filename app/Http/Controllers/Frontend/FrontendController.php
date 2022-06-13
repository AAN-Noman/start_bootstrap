<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Team;
use App\Models\About;
use App\Models\Story;
use App\Models\Portfolio;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;

class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = TeamMember::all();
        $teams = Team::all();
        $abouts = About::all();
        $storys = Story::all();
        $portfolios = Portfolio::all();
        $banners = Banner::all();
        return view('frontend.index', compact('datas', 'teams', 'abouts', 'storys', 'portfolios', 'banners'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view()
    {
        $portfolios = Portfolio::all();
        return view('frontend.view', compact('portfolios'));
    }
}
