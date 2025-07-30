<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index(){
        $data['achievements'] = \App\Models\Achievement::all();
        return view('achievement.index',$data);
    }

    public function create(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'year' => 'required|integer',
            'certificate_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $achievement = new \App\Models\Achievement();
        $achievement->title = $request->title;
        $achievement->name = $request->name;
        $achievement->category = $request->category;
        $achievement->level = $request->level;
        $achievement->year = $request->year;

        if ($request->hasFile('certificate_image')) {
            $imageName = time().'.'.$request->certificate_image->extension();
            $request->certificate_image->move(public_path('images/achievements'), $imageName);
            $achievement->certificate_image = $imageName;
        }

        $achievement->save();

        toast('Achievement created successfully!', 'success');
        return redirect('/achievement')->with('success', 'Achievement created successfully!');
    }

    // public function edit(Request $request){
    //     $data['achievement'] = \App\Models\Achievement::find($request->id);
    //     return view('achievement.index',$data);
    // }
}
