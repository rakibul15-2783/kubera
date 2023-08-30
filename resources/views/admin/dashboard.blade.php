@extends('admin.layouts.master')
@section('main-content')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
       <h3> Dashboard</h3>
    </div>
    <div class="col-auto ml-auto text-right mt-n1">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
             <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          </ol>
       </nav>
    </div>
 </div>
 <div class="row">
    <div class="col-sm-6 col-xl-3">
       <div class="card">
          <div class="card-body">
             <div class="row">
                <div class="col mt-0">
                   <h5 class="card-title m-0">Total User</h5>
                </div>
                <div class="col-auto">
                   <div class="avatar">
                   </div>
                </div>
             </div>
             <h1 class="display-5 mt-1 mb-2">{{ $totalUser }}</h1>
             <div class="col mt-0">
                <h5 class="card-title m-0">Investor: {{ $investor }}</h5>
                <h5 class="card-title m-0">Entrepreneur: {{ $entrepreneur }}</h5>
             </div>
          </div>
       </div>
    </div>
    <div class="col-sm-6 col-xl-3">
       <div class="card">
          <div class="card-body">
             <div class="row">
                <div class="col mt-0">
                   <h5 class="card-title m-0">User Request</h5>
                </div>
                <div class="col-auto">
                   <div class="avatar">
                   </div>
                </div>
             </div>
             <h1 class="display-5 mt-1 mb-2">{{ $requestUser }}</h1>
          </div>
       </div>
    </div>
    <div class="col-sm-6 col-xl-3">
       <div class="card">
          <div class="card-body">
             <div class="row">
                <div class="col mt-0">
                   <h5 class="card-title m-0">Total Project</h5>
                </div>
                <div class="col-auto">
                   <div class="avatar">
                   </div>
                </div>
             </div>
             <h1 class="display-5 mt-1 mb-2">{{ $totalProject }}</h1>
          </div>
       </div>
    </div>
 </div>
@endsection
