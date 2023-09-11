<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectDetails;

class InvestorProjectController extends Controller
{
    public function projects()
    {
        $projects = Project::all();

        return view('user.investor.projects',compact('projects'));
    }

    public function projectDetails($id)
    {
        $project = Project::find($id);

        return view('user.investor.project-details',compact('project'));
    }
}
