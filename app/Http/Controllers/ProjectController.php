<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $data['projects'] = Project::all();
        return view('project.index',$data);
    }

}
