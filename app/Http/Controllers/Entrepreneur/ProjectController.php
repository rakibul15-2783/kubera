<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectValidation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectDetails;

class ProjectController extends Controller
{
    public function myProject()
    {
        $projects = Project::where('user_id', auth()->user()->id)->get();
        return view('user.entrepreneur.projects',compact('projects'));
    }

    public function addProject()
    {
        return view('user.entrepreneur.add-project');
    }

    public function projectSubmit(ProjectValidation $request)
    {

    $project = new Project();
    $projectDetails = new ProjectDetails();

    $project->user_id = auth()->user()->id;
    $project->status = 1;

    $projectDetails->project_title = $request->project_title;
    $projectDetails->project_category = $request->project_category;
    $projectDetails->description = $request->description;
    $projectDetails->current_status = $request->current_status;
    $projectDetails->estimate_budget = $request->estimate_budget;
    $projectDetails->is_donated = $request->is_donated;
    $projectDetails->donation_amount = $request->donation_amount;
    $projectDetails->prcentage_of_completion = $request->prcentage_of_completion;
    $projectDetails->team_members = $request->team_members;
    $projectDetails->your_role = $request->your_role;

    if ($request->hasFile('document')) {
        $document = $request->file('document');
        $documentName = rand() . '.' . $document->getClientOriginalExtension();
        $documentPath = 'upload/documents/' . $documentName;
        Storage::disk('public')->put($documentPath, file_get_contents($document));
        $document->move(public_path('upload/documents/'), $documentName);
        $projectDetails->document = $documentPath;
    }

    $project->save();
    $projectDetails->project_id = $project->id;
    $projectDetails->save();

    return redirect()->route('my.project');

    }
}
