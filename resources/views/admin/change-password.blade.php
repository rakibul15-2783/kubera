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
        <h3><strong>Change Password</strong> Dashboard</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
            </ol>
        </nav>
        </div>
    </div>

	<div class="row">
        <div class="col-lg-4"></div>
		<div class="col-lg-4">
            @if(session('success'))
                <div class="text-success">
                    <span >{{ session('success') }}</span>
                </div>

            @endif
            <form action="{{ route('admin.password.post',['id' => auth()->guard('admin')->user()->id]) }}" method="POST">
                @csrf
                <div class="form-group pass_show">
                    <input type="password" name="old_password" class="form-control" required placeholder="Current Password">
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if(session('error'))
                        <span class="text-danger">{{ session('error') }}</span>
                    @endif
                </div>
                <div class="form-group pass_show">
                    <input type="password" name="password" class="form-control" required placeholder="New Password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderrorphp 
                </div>
                <div class="form-group pass_show">
                    <input type="password" name="password_confirmation" class="form-control" required placeholder="Confirm Password">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if(session('newPassError'))
                        <span class="text-danger">{{ session('newPassError') }}</span>
                    @endif
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-info">Change Password</button>
                </div>
            </form>
		</div>
	</div>

@endsection

