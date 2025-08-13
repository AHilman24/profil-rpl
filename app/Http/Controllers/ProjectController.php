<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $data['projects'] = Project::all();
        return view('project.index', $data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required',
            'description' => 'required|string',
            'tech_stack' => 'required|array',
            // 'tech_stack.*' => [
            //     'required','string','max:50','regex:/^[A-Za-z0-9\s\+\#\.\-]+$/',
            // ],
            'link_preview' => 'nullable|url',
            'github_link' => 'nullable|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->all();
        if ($request->hasFile('thumbnail')) {
            $fileName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/projects'), $fileName);
            $data['thumbnail'] = $fileName;
        }

        $data['tech_stack'] = json_encode($data['tech_stack']);

        Project::create($data);
        toast('Project created successfully.', 'success');
        return redirect('/project');
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        if ($project->thumbnail && file_exists(public_path('images/projects/' . $project->thumbnail))) {
            unlink(public_path('images/projects/' . $project->thumbnail));
        }
        $project->delete();
        toast('Project deleted successfully.', 'success');
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required',
            'description' => 'required|string',
            'tech_stack' => 'required|array',
            'link_preview' => 'nullable|url',
            'github_link' => 'nullable|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $project = Project::findOrFail($id);

        $data = $request->except(['thumbnail']); // exclude file dulu

        // Simpan thumbnail baru jika ada
        if ($request->hasFile('thumbnail')) {
            // hapus file lama
            if ($project->thumbnail && file_exists(public_path('images/projects/' . $project->thumbnail))) {
                unlink(public_path('images/projects/' . $project->thumbnail));
            }

            $fileName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images/projects'), $fileName);
            $data['thumbnail'] = $fileName;
        }

        // Encode array tech_stack ke JSON
        $data['tech_stack'] = json_encode($data['tech_stack']);

        $project->update($data);

        toast('Project updated successfully.', 'success');
        return redirect('/project');
    }
}
