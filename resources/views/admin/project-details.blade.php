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
        <div class="col-xl-6">
            <div class=" ">
                <h3>Project Details</h3>
            </div>
            <div class=" ">
                <b><label for="role">Entrepreneur Name: </label></b><span></span>
            </div>
            <div class=" ">
                <b><label for="role">Project Title: </label></b><span></span>
            </div>
            <div class=" ">
                <b><label for="name">Project Category: </label></b><span> </span>
            </div>
            <div class=" ">
                <b><label for="phone">Project Description:</label></b><span></span>
            </div>
            <div class=" ">
                <b><label for="nid">Estimate Budget: </label></b><span> </span>
            </div>
            <div class=" ">
                <b><label for="birth_c">Donation Amount: </label></b><span> </span>
            </div>
            <div class=" ">
                <b><label for="passport_no">Percentage of Completion: </label></b><span> </span>
            </div>
            <div class=" ">
                <b><label for="passport_no">Team Members: </label></b><span> </span>
            </div>
            <div class=" ">
                <b><label for="passport_no">Entrepreneur Role: </label></b><span> </span>
            </div>
            <div class=" ">
                <b><label for="passport_no">Document: </label></b><span> </span>
            </div>
        </div>

</div>
@endsection
