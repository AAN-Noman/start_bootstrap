<?php

namespace App\Http\Controllers\Backend;


use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Banner::all();
        return view('backend.banner.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
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
            $uploads_photo = $photo->move(public_path("/storage/banner/"),$photo_name);

            if($uploads_photo){
                $insert = New Banner();
                $insert->title = $request->title;
                $insert->description = $request->description;
                $insert->photo = $photo_name;
                $insert->save();
                return redirect(route('backend.banner.index'))->with("success", "Banner Insert Successfull!");
            };

        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $this->validate($request,[
            "title" => "required",
            "photo" => "mimes:png,jpg,gif,jpeg,webp|max:1024"
        ]);

        $photo = $request->file('photo');

        if(!empty($photo)){
                $photo_name = Str::slug($request->title)."_".time(). ".".$photo->getClientOriginalExtension();
                $uploads_photo = $photo->move(public_path("/storage/banner/"),$photo_name);
                $path = public_path('storage/banner/'.$banner->photo);
                if(file_exists($path)){
                    unlink($path);
                }
        }else{
            $photo_name = $banner->photo;
        }

            $banner->title = $request->title;
            $banner->description = $request->description;
            $banner->photo = $photo_name;
            $banner->save();
            return back()->with("success", "Banner Insert Successfull!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        $banner->save();
        return back()->with('success', "Banner successfully deleted!");
    }
}
