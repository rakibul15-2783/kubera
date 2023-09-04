@extends('admin.layouts.master')
@section('main-content')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>User</strong> Dashboard</h3>
    </div>
    <div class="col-auto ml-auto text-right mt-n1">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
             <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
             <li class="breadcrumb-item active" aria-current="page">User</li>
          </ol>
       </nav>
    </div>
 </div>



    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <form action="{{ route('search.user.list') }}" method="GET">
                <div class="input-group">
                    <input class="form-control" name="search" value="{{ Request::get('search') }}" placeholder="Search by email..." type="text">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-info">Search</button>
                        <a href="{{ route('user.list') }}" class="btn-sm btn-danger"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div><br>
    <div class="card shadow">
        <ul class="list-group">
            <li class="list-group-item list-group-item">
                <div class="row">
                    <div class="col-md-1"><b>SL</b></div>
                    <div class="col-md-3"><b>Name</b></div>
                    <div class="col-md-3"><b>Email</b></div>
                    <div class="col-md-2"><b>Role</b></div>
                    <div class="col-md-3"><b>Details</b></div>
                </div>
            </li>
            @if($users->count() > 0)
                @php
                    $sl = 1;
                @endphp

                @foreach ($users as $user)
                    <li class="list-group-item list-group-item">
                        <div class="row">
                            <div class="col-md-1">{{ $sl++ }}</div>
                            <div class="col-md-3">{{ $user->name }}</div>
                            <div class="col-md-3">{{ $user->email }}</div>
                            <div class="col-md-2">
                                @if ($user->role == 1)
                                    <span>Investor</span>
                                @else
                                    <span>Entrepreneur</span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('user.profile',['id' => $user->id]) }}">Click Here</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>




@endsection

