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

		    <label>Current Password</label>
		    <div class="form-group pass_show">
                <input type="password" value="faisalkhan@123" class="form-control" placeholder="Current Password">
            </div>
		       <label>New Password</label>
            <div class="form-group pass_show">
                <input type="password" value="faisal.khan@123" class="form-control" placeholder="New Password">
            </div>
		       <label>Confirm Password</label>
            <div class="form-group pass_show">
                <input type="password" value="faisal.khan@123" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-info">Chnage Password</button>
            </div>

		</div>
	</div>

@endsection

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $('.pass_show').append('<span class="ptxt">Show</span>');
        });
        $(document).on('click','.pass_show .ptxt', function(){
        $(this).text($(this).text() == "Show" ? "Hide" : "Show");
        $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });

    });
</script>
