<?php

namespace App\Http\Controllers\Backend;

use App\Models\TeamMember;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = TeamMember::all();
        return view('backend.teamMember.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teamMember.index');
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
            'name' => 'required',
            'proportion' => 'required',
            "photo" => "required|mimes:png,jpg,gif,jpeg,webp|max:1024",
        ]);
        $photo = $request->file('photo');
        if(!empty('photo')){
            $photo_name = Str::slug($request->name)."_".time().".".$photo->getClientOriginalExtension();
            $uploads_photo = $photo->move(public_path('/storage/teamMember/'), $photo_name);
            if($uploads_photo){
                $insert = New TeamMember();
                $insert->name = $request->name;
                $insert->proportion = $request->proportion;
                $insert->photo = $photo_name;
                $insert->twitter = $request->twitter;
                $insert->facebook = $request->facebook;
                $insert->linkedin = $request->linkedin;
                $insert->save();
                return back()->with('success', 'Data insart successfully!!');
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMember $teamMember)
    {
        return view('backend.teamMember.edit', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        $this->validate($request,[
            'name' => 'required',
            'proportion' => 'required',
            "photo" => "required|mimes:png,jpg,gif,jpeg,webp|max:1024"
        ]);
        $photo = $request->file('photo');
        if(!empty('photo')){
            $photo_name = Str::slug($request->name)."_".time().".".$photo->getClientOriginalExtension();
            $uploads_photo = $photo->move(public_path('/storage/teamMember/'), $photo_name);
            $path = public_path('storage/teamMembber/'.$teamMember->photo);
                if(file_exists($path)){
                    unlink($path);
                }
        }else{
            $photo_name = $teamMember->photo;
        }
        $teamMember->name = $request->name;
        $teamMember->proportion = $request->proportion;
        $teamMember->photo = $photo_name;
        $teamMember->twitter = $request->twitter;
        $teamMember->facebook = $request->facebook;
        $teamMember->linkedin = $request->linkedin;
        $teamMember->save();
        return redirect(route('backend.teamMember.index'))->with("success", "Update Successfull!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        $teamMember->save();
        return back()->with('success', "Banner successfully deleted!");
    }
}
