<?php

namespace App\Http\Controllers\Backend;

use App\Models\Story;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Story::all();
        return view('backend.storys.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.storys.create');
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
            "title" => "required",
            'photo' => "required|mimes:png,jpg,gif,jpeg,webp|max:1024"
        ]);

        $photo = $request->file('photo');

        if(!empty($photo)){
            $photo_name = Str::slug($request->title)."_".time().".".$photo->getClientOriginalExtension();
            $uploads_photo = $photo->move(public_path("/storage/story/"), $photo_name);

            if($uploads_photo){
                $insert = New Story();
                $insert->date = $request->date;
                $insert->title = $request->title;
                $insert->description = $request->description;
                $insert->photo = $photo_name;
                $insert->save();
                return redirect(route('backend.story.index'))->with('success', 'story insert successfully!!');
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        return view('backend.storys.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $this->validate($request,[
            "title" => "required",
            "photo" => "mimes:png,jpg,gif,jpeg,webp|max:1024"
        ]);
        $photo = $request->file('photo');
        if(!empty($photo)){
            $photo_name = Str::slug($request->title)."_".time().".".$photo->getClientOriginalExtension();

            $photo->move(public_path('storage/story/'), $photo_name);

            $path = public_path("/storage/story/". $photo_name);
            if(file_exists($path)){
                unlink($path);
            }else{
                $photo_name = $story->photo;
            }
            $story->date = $request->date;
            $story->title = $request->title;
            $story->description = $request->description;
            $story->photo = $photo_name;
            $story->save();
            return redirect(route('backend.story.index'))->with('success','data updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();
        $story->save();
        return back()->with('success','data deleted');
    }
}
