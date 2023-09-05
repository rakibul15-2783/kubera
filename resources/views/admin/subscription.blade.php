@extends('admin.layouts.master')
@section('main-content')

<style>

.pass_show{position: relative}

.pass_show .ptxt {

    position: absolute;
    top: 50%;
    right: 10px;
    z-index: 1;
    color: #f36c01;
    margin-top: -10px;
    cursor: pointer;
    transition: .3s ease all;

}

.pass_show .ptxt:hover{color: #333333;}

</style>

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
        <h3><strong>Subscription</strong> Dashboard</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subscription</li>
            </ol>
        </nav>
        </div>
    </div>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#planModal">
    Add Subscription Plan
  </button>

  <!-- Modal -->
  <div class="modal fade" id="planModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Plan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('plan.post') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="plan_name">Plan Name</label>
                    <input type="text" name="plan_name" class="form-control" required placeholder="Enter Plan Name">
                </div>
                <div class="form-group">
                    <label for="period">Period</label>
                    <input type="number" name="period" class="form-control" required placeholder="Enter Period in Month (1,2,3...)">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" required placeholder="Enter Price">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<br><br>
    @if(!$plans->isEmpty())

    <div class="card shadow">
        <ul class="list-group">
            <li class="list-group-item list-group-item">
                <div class="row">
                    <div class="col-md-2"><b>SL</b></div>
                    <div class="col-md-2"><b>Plan Name</b></div>
                    <div class="col-md-2"><b>Period</b></div>
                    <div class="col-md-2"><b>Price</b></div>
                    <div class="col-md-2"><b>Status</b></div>
                    <div class="col-md-2"><b>Action</b></div>
                </div>
            </li>

            @php
                $sl = 1;
            @endphp

            @foreach ($plans as $plan)
                <li class="list-group-item list-group-item">
                    <div class="row">
                        <div class="col-md-2">{{ $sl++ }}</div>
                        <div class="col-md-2">{{ $plan->plan_name }}</div>
                        <div class="col-md-2">{{ $plan->period }}</div>
                        <div class="col-md-2">{{ $plan->price }}</div>
                        <div class="col-md-2">
                            @if ($plan->status == 1)
                                <span>Active</span>
                            @else
                                <span>Inactive</span>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <a href="" class="btn btn-sm btn-primary"> Edit</a>
                            <a href="" class="btn btn-sm btn-danger"> Delete</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@else
    <div class="col-lg-6 alert alert-info ">
        <span class="">Plans not available</span>
    </div>
@endif

@endsection

