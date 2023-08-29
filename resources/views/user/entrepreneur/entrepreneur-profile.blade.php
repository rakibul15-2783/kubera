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
        <h2>Investor Profile</h2>
        <div class="col-md-12 col-xl-12 card p-3">
            <form action="{{ route('entrepreneur.profile.update.post',['id' => auth()->user()->id]) }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="form-row col-xl-6">
                        <div class="form-group ">
                            <h5>Basic Info</h5>
                        </div>
                        <div class="form-group ">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="name form-control" id="name" >
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group ">
                            <label for="phone">Contact Number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="phone form-control" id="phone" >
                        </div>
                        <div class="form-group ">
                            <label for="nid">NID</label>
                            <input type="text" name="nid" value="{{ old('nid') }}" class="nid form-control" id="nid" >
                        </div>
                        @error('nid')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group ">
                            <label for="birth_c">Birth Certificate</label>
                            <input type="text" name="birth_c" value="{{ old('birth_c') }}" class="birth_c form-control" id="birth_c">
                        </div>
                        @error('birth_c')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group ">
                            <label for="passport_no">Passport no</label>
                            <input type="text" name="passport_no" value="{{ old('passport_no') }}" class="form-control passport_no" id="passport_no">
                        </div>
                    </div>
                    <div class="form-row col-xl-6 text-content">
                        <div class="form-group ">
                            <h5>Profile Image</h5>
                        </div>
                        <div class="form-group ">
                            <input type="file" name="profile_image" value="{{ old('profile_image') }}" class="profile_image form-control"  id="profile_image" />
                        </div>
                        @error('profile_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror<br>
                        <div class="form-group ">
                            <h5>Bio</h5>
                        </div>
                        <div class="form-group ">
                            <textarea name="bio" id="" class="bio form-control" value="{{ old('bio') }}" cols="40" rows="4" ></textarea>
                        </div>
                    </div>

                </div><br>
                <div class="form-row col-xl-6">
                    <div class="form-group ">
                        <h5>Address Info</h5>
                    </div>
                    <div class="form-group ">
                        <label for="country">Country</label>
                            <select name="country" class="form-control"  required id="country">
                                <option value="">-----Choose Country-----</option>
                                <option value="United State">United State</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Canada">Canada</option>
                            </select>
                    </div>
                    @error('country')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group ">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" class="address form-control" required id="address" >
                    </div>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group ">
                        <label for="text">State</label>
                        <input type="text" name="state" value="{{ old('state') }}" class="state form-control" required id="state" >
                    </div>
                    @error('state')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group ">
                        <label for="city">City</label>
                        <input type="text" name="city" value="{{ old('city') }}" class="city form-control" required id="city">
                    </div>
                    @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group ">
                        <label for="zip_code">Zip Code</label>
                        <input type="number" name="zip_code" value="{{ old('zip_code') }}" class="form-control zip_code" required id="zip_code">
                    </div>
                    @error('zip_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
