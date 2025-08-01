<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'projects' => \App\Models\Project::all(),
            'achievements' => \App\Models\Achievement::all(),
            'gallery' => \App\Models\Galleri::all(),
            'total_projects' => \App\Models\Project::count(),
            'total_achievements' => \App\Models\Achievement::count(),
            'total_gallery' => \App\Models\Galleri::count(),
        ];
        return view('dashboard', $data);
    }
}
