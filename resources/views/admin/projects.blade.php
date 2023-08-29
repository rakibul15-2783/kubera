@extends('admin.layouts.master')
@section('main-content')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>Projects</strong> Dashboard</h3>
    </div>
    <div class="col-auto ml-auto text-right mt-n1">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
             <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
             <li class="breadcrumb-item active" aria-current="page">Projects</li>
          </ol>
       </nav>
    </div>
 </div>
 <div class="card shadow">
    <ul class="list-group">
        <li class="list-group-item list-group-item">
            <div class="row">
                <div class="col-md-1"><b>SL</b></div>
                <div class="col-md-3"><b>Name</b></div>
                <div class="col-md-3"><b>Title</b></div>
                <div class="col-md-3"><b>Details</b></div>
                <div class="col-md-2"><b>Date</b></div>
            </div>
        </li>
        @if(!$projects->isEmpty())
            @php
                $sl = 1;
            @endphp
            @foreach ($projects as $project)
            <li class="list-group-item list-group-item">
                <div class="row">
                    <div class="col-md-1">{{ $sl++ }}</div>
                    <div class="col-md-3">{{ $project->user->name }}</div>
                    <div class="col-md-3">{{ $project->projectDetails->project_title }}</div>
                    <div class="col-md-3"><a href="{{ route('project.details') }}" class="btn btn-sm btn-info">Details</a></div>
                    <div class="col-md-2">{{ $project->created_at->format('Y-m-d') }}</div>
                </div>
            </li>
            @endforeach
        @else
        <div>
            <span>Project not available</span>
        </div>
        @endif
    </ul>
</div>
@endsection
