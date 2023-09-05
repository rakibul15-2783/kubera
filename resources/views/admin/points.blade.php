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
               <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pointModal">
                Give Points
            </button>

            <!-- Modal -->
            <div class="modal fade" id="pointModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Give Points</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{ route('donate.point') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="user_id">Entrepreneur</label>
                                <select name="user_id" id="" class="form-control">
                                    <option value="">-----Select Entrepreneur-----</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }} ">{{ $user->email }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="points">Points</label>
                                <select name="points" id="" class="form-control">
                                    <option value="">-----Select points-----</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <br><br>
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
                        <div class="col-md-3">{{ $user->userDetails->points }}</div>
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

