@extends('admin.layouts.master')
@section('main-content')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>{{ $user->name }}  </strong><span> New User </span> Dashboard</h3>
    </div>
    <div class="col-auto ml-auto text-right mt-n1">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
             <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
             <li class="breadcrumb-item active" aria-current="page">New User </li>
             <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
          </ol>
       </nav>
    </div>
 </div>
    <div class="col-md-12 col-xl-12  p-3">
            <div class="row">
                <div class="col-xl-6">
                    <div class=" ">
                        <h3>Basic Info</h3>
                    </div>
                    <div class=" ">
                        <b><label for="role">Role: </label></b><span> Investor</span>
                    </div>
                    <div class=" ">
                        <b><label for="name">Name: </label></b><span> {{ $user->name }}</span>
                    </div>
                    <div class=" ">
                        <b><label for="phone">Phone:</label></b><span>{{ $userDetails->phone }}</span>
                    </div>
                    <div class=" ">
                        <b><label for="nid">NID: </label></b><span> {{$userDetails->nid }}</span>
                    </div>
                    <div class=" ">
                        <b><label for="birth_c">Birth Certificate: </label></b><span> {{ $userDetails->birth_c }}</span>
                    </div>
                    <div class=" ">
                        <b><label for="passport_no">Passport no: </label></b><span> {{ $userDetails->passport_no }}</span>
                    </div>
                </div>
                <div class=" col-xl-6 text-content">
                    <div class=" ">
                        <h3>Profile Image</h3>
                    </div>
                    <div class=" ">
                        <img height="200px" width="200px" src="{{ asset('upload/profile/' . $userDetails->profile_image) }}" alt="Profile Image">
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class=" col-xl-6">
                    <div class=" ">
                        <h3>Address Info</h3>
                    </div>
                    <div class=" ">
                        <b><label for="country">Country: </label></b><span> {{ $userAddress->country }}</span>
                    </div>
                    <div class=" ">
                        <b><label for="address">Address</label></b><span> {{ $userAddress->address }}</span>
                    </div>
                    <div class=" ">
                        <b><label for="text">State</label><span></b> {{ $userAddress->state }}</span>
                    </div>
                    <div class=" ">
                        <b><label for="city">City</label></b><span> {{ $userAddress->city }}</span>
                    </div>
                    <div class=" ">
                        <b><label for="zip_code">Zip Code</label><span></b> {{ $userAddress->zip_code }}</span>
                    </div>
                </div><br>
                <div class="col-xl-6">
                    <div class=" ">
                        <h3>Bio</h3><span> {{ $userDetails->bio }}</span>
                    </div><br>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('new.user.accept',['id' => $user->id]) }}" class="btn btn-success">Accept</a>
                <a href="{{ route('new.user.deny',['id' => $user->id]) }}" class="btn btn-danger">Deny</a>
            </div>
    </div>
@endsection
