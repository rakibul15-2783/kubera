<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kubera | Investor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<h2></h2>
<div class="container">
    <div class="row">
        <h2>Your Profile Information</h2>
        <div class="col-md-12 col-xl-12 card p-3">
                <div class="row">
                    <div class="form-row col-xl-6">
                        <div class="form-group ">
                            <h3>Basic Info</h3>
                        </div>
                        <div class="form-group ">
                            <b><label for="role">Role: </label></b><span> Entrepreneur</span>
                        </div>
                        <div class="form-group ">
                            <b><label for="name">Name: </label></b><span> {{ auth()->user()->name }}</span>
                        </div>
                        <div class="form-group ">
                            <b><label for="phone">Phone:</label></b><span>{{ $userDetails->phone }}</span>
                        </div>
                        <div class="form-group ">
                            <b><label for="nid">NID: </label></b><span> {{$userDetails->nid }}</span>
                        </div>
                        <div class="form-group ">
                            <b><label for="birth_c">Birth Certificate: </label></b><span> {{ $userDetails->birth_c }}</span>
                        </div>
                        <div class="form-group ">
                            <b><label for="passport_no">Passport no: </label></b><span> {{ $userDetails->passport_no }}</span>
                        </div>
                    </div>
                    <div class="form-row col-xl-6 text-content">
                        <div class="form-group ">
                            <h5>Profile Image</h5>
                        </div>
                        <div class="form-group ">
                            <img height="200px" width="200px" src="{{ asset('upload/profile/' . $userDetails->profile_image) }}" alt="Profile Image">
                        </div>
                        <div class="form-group ">
                            <h5>Bio</h5><span> {{ $userDetails->bio }}</span>
                        </div><br>
                        @if (auth()->user()->user_verification_request == 1 )

                            <span class="btn btn-info">Verification Request Send</span>

                        @endif
                        @if (auth()->user()->user_verified == 1 )
                        <div class="form-group ">
                            <span class="btn btn-info">Verified</span>
                        </div>
                        @endif
                    </div>

                </div><br>
                <div class="form-row col-xl-6">
                    <div class="form-group ">
                        <h3>Address Info</h3>
                    </div>
                    <div class="form-group ">
                        <b><label for="country">Country: </label></b><span> {{ $userAddress->country }}</span>
                    </div>
                    <div class="form-group ">
                        <b><label for="address">Address</label></b><span> {{ $userAddress->address }}</span>
                    </div>
                    <div class="form-group ">
                        <b><label for="text">State</label><span></b> {{ $userAddress->state }}</span>
                    </div>
                    <div class="form-group ">
                        <b><label for="city">City</label></b><span> {{ $userAddress->city }}</span>
                    </div>
                    <div class="form-group ">
                        <b><label for="zip_code">Zip Code</label><span></b> {{ $userAddress->zip_code }}</span>
                    </div>
                </div><br>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>

