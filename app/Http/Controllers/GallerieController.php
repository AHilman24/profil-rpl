<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GallerieController extends Controller
{
    public function index()
    {
        $data['galleries'] = \App\Models\Galleri::all();
        return view('gallerie.index', $data);
    }

    public function create(Request $request)
    {
        $credentials = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);

        $gallerie = new \App\Models\Galleri();
        $gallerie->title = $credentials['title'];
        $gallerie->description = $credentials['description'];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/galleries'), $imageName);
            $gallerie->image = $imageName;
        }

        $gallerie->save();

        toast('Gallery item created successfully!', 'success');
        return redirect('/gallerie')->with('success', 'Gallery item created successfully!');
    }

    public function edit(Request $request,$id)
    {
        $credentials = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);

        $gallerie = \App\Models\Galleri::findOrFail($id);
        $gallerie->title = $credentials['title'];
        $gallerie->description = $credentials['description'];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($gallerie->image) {
                $oldImagePath = public_path('images/galleries/' . $gallerie->image);
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/galleries'), $imageName);
            $gallerie->image = $imageName;
        }

        $gallerie->save();

        toast('Gallery item updated successfully!', 'success');
        return redirect('/gallerie')->with('success', 'Gallery item updated successfully!');
    }

    public function delete(Request $request, $id)
    {
        $gallerie = \App\Models\Galleri::where('id', $id)->first();
        if ($gallerie) {
            // Hapus file gambar jika ada
            if ($gallerie->image) {
                $imagePath = public_path('images/galleries/' . $gallerie->image);
                if (file_exists($imagePath)) {
                    @unlink($imagePath);
                }
            }
            $gallerie->delete();
            toast('Gallery item deleted successfully!', 'success');
            return redirect('/gallerie')->with('success', 'Gallery item deleted successfully!');
        } else {
            toast('Gallery item not found!', 'error');
            return redirect('/gallerie')->with('error', 'Gallery item not found!');
        }
    }
}
