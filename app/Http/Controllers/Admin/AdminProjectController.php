<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class AdminProjectController extends Controller
{
    public function projects()
    {
        $projects = Project::all();

        return view('admin.projects',compact('projects'));
    }

    public function projectDetails($id)
    {
        $project = Project::find($id);

        return view('admin.project-details',compact('project'));
    }
}
