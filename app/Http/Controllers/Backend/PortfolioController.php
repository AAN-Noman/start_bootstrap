<?php

namespace App\Http\Controllers\Backend;

use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Portfolio::all();
        return view('backend.portfolio.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => "required",
            "photo" => "required|mimes:png,jpg,gif,jpeg,webp|max:1024"
        ]);

        $photo = $request->file('photo');

        if(!empty($photo)){
            $photo_name = Str::slug($request->title)."_".time().".".$photo->getClientOriginalExtension();
            $upload_photo = $photo->move(public_path("/storage/portfolio/"), $photo_name);
            if($upload_photo){
                $insert = New portfolio();
                $insert->title = $request->title;
                $insert->shortDescription = $request->shortDescription;
                $insert->description = $request->description;
                $insert->client = $request->client;
                $insert->category = $request->category;
                $insert->photo = $photo_name;
                $insert->save();
                return redirect(route('backend.portfolio.index'))->with('success', 'Portfolio Insert Sucssesfully!');
            };
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('backend.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $this->validate($request,[
            'title' => "required",
            "photo" => "mimes:png,jpg,gif,jpeg,webp|max:1024"
        ]);
        $photo = $request->file('photo');
        if(!empty($photo)){
            $photo_name = Str::slug($request->title)."_".time().".".$photo->getClientOriginalExtension();
            $uploads_photo = $photo->move(public_path("/storage/portfolio/"), $photo_name);
            $path = public_path("/storage/portfolio/".$portfolio->photo);
            if(file_exists($path)){
                unlink($path);
            }else{
                $photo_name = $portfolio->photo;
            }
            $portfolio->title = $request->title;
            $portfolio->shortDescription = $request->shortDescription;
            $portfolio->description = $request->description;
            $portfolio->client = $request->client;
            $portfolio->category = $request->category;
            $portfolio->photo = $photo_name;
            $portfolio->save();
            return redirect(route('backend.portfolio.index'))->with('Portfolio updated successfully');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        $portfolio->save();
        return back()->with('success', 'Protfolio deleted successfully!!');
    }
}
