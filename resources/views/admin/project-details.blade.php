@extends('admin.layouts.master')
@section('main-content')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>Project Details </strong><strong>Projects</strong> Dashboard</h3>
    </div>
    <div class="col-auto ml-auto text-right mt-n1">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
             <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
             <li class="breadcrumb-item active" aria-current="page">Projects</li>
             <li class="breadcrumb-item active" aria-current="page">Project Details</li>
          </ol>
       </nav>
    </div>

</div>

<div class="col-md-12 col-xl-12  p-3">
    <div class="row">
        <div class="col-lg-6">
            <div class=" ">
                <h3>Project Details</h3>
            </div>
            <div class=" ">
                <b><span >Project id: </span></b><span> ##000{{ $project->id }}</span>
            </div>
            <div class=" ">
                <b><span >Entrepreneur Name: </span></b><span>{{ $project->user->name }}</span>
            </div>
            <div class=" ">
                <b><span >Project Title: </span></b><span> {{ $project->projectDetails->project_title }}</span>
            </div>
            <div class=" ">
                <b><span >Project Category: </span></b><span> {{ $project->projectDetails->project_category }}</span>
            </div>
            <div class=" ">
                <b><span >Project Description:</span></b><span> {{ $project->projectDetails->description }}</span>
            </div>
            <div class=" ">
                <b><span >Estimate Budget: </span></b><span> {{ $project->projectDetails->estimate_budget }}</span>
            </div>
            <div class=" ">
                <b><span >Donation Amount: </span></b><span>{{ $project->projectDetails->donation_amount }}</span>
            </div>
            <div class=" ">
                <b><span >Percentage of Completion: </span></b><span> {{ $project->projectDetails->prcentage_of_completion }}</span>
            </div>
            <div class=" ">
                <b><span >Team Members: </span></b><span> {{ $project->projectDetails->team_members }}</span>
            </div>
            <div class=" ">
                <b><span >Entrepreneur Role: </span></b><span> {{ $project->projectDetails->your_role }}</span>
            </div>
            <div class=" ">
                <b><span >Document: </span></b><span> </span>
            </div>
        </div>
    </div>
</div>
@endsection
