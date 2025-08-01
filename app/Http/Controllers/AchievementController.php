<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $data['achievements'] = \App\Models\Achievement::all();
        return view('achievement.index', $data);
    }

    public function create(Request $request)
    {
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
            $imageName = time() . '.' . $request->certificate_image->extension();
            $request->certificate_image->move(public_path('images/achievements'), $imageName);
            $achievement->certificate_image = $imageName;
        }

        $achievement->save();

        toast('Achievement created successfully!', 'success');
        return redirect('/achievement')->with('success', 'Achievement created successfully!');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'year' => 'required|integer',
            'certificate_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $achievement = \App\Models\Achievement::findOrFail($id);
        $achievement->title = $request->title;
        $achievement->name = $request->name;
        $achievement->category = $request->category;
        $achievement->level = $request->level;
        $achievement->year = $request->year;

        if ($request->hasFile('certificate_image')) {
            // Hapus file gambar lama jika ada
            if ($achievement->certificate_image) {
                $imagePath = public_path('images/achievements/' . $achievement->certificate_image);
                if (file_exists($imagePath)) {
                    @unlink($imagePath);
                }
            }
            $imageName = time() . '.' . $request->certificate_image->extension();
            $request->certificate_image->move(public_path('images/achievements'), $imageName);
            $achievement->certificate_image = $imageName;
        }

        $achievement->save();

        toast('Achievement updated successfully!', 'success');
        return redirect('/achievement')->with('success', 'Achievement updated successfully!');
    }

    public function delete(Request $request, $id)
    {
        $achievement = \App\Models\Achievement::where('id', $id)->first();
        if ($achievement) {
            // Hapus file gambar jika ada
            if ($achievement->certificate_image) {
                $imagePath = public_path('images/achievements/' . $achievement->certificate_image);
                if (file_exists($imagePath)) {
                    @unlink($imagePath);
                }
            }
            $achievement->delete();
            toast('Achievement deleted successfully!', 'success');
            return redirect('/achievement')->with('success', 'Achievement deleted successfully!');
        } else {
            toast('Achievement not found!', 'error');
            return redirect('/achievement')->with('error', 'Achievement not found!');
        }
    }
}
