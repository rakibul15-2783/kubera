@extends('admin.layouts.master')
@section('main-content')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>Points</strong> Dashboard</h3>
    </div>
    <div class="col-auto ml-auto text-right mt-n1">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
             <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
             <li class="breadcrumb-item active" aria-current="page">Points</li>
          </ol>
       </nav>
    </div>
 </div>

@if(!$users->isEmpty())

    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-primary">Give points</button>
        </div>
        <div class="col-md-6"></div>
    </div><br>
    <div class="card shadow">
        <ul class="list-group">
            <li class="list-group-item list-group-item">
                <div class="row">
                    <div class="col-md-3"><b>SL</b></div>
                    <div class="col-md-3"><b>Entrepreneur Name</b></div>
                    <div class="col-md-3"><b>Email</b></div>
                    <div class="col-md-3"><b>Points</b></div>
                </div>
            </li>

            @php
                $sl = 1;
            @endphp

            @foreach ($users as $user)
                <li class="list-group-item list-group-item">
                    <div class="row">
                        <div class="col-md-3">{{ $sl++ }}</div>
                        <div class="col-md-3">{{ $user->name }}</div>
                        <div class="col-md-3">{{ $user->email }}</div>
                        <div class="col-md-3">{{ $user->points }}</div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@else
    <div class="col-lg-6 alert alert-info ">
        <span class="">Users available</span>
    </div>
@endif


@endsection

