<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<h2></h2>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xl-12 card p-3">
                    <form action="{{ route('user.profile.update.post') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-row col-xl-6">
                                <div class="form-group ">
                                    <h5>Basic Info</h5>
                                </div>
                                <div class="form-group ">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="name form-control" id="name" required>
                                </div>
                                <div class="form-group ">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="number" name="contact_number" class="contact_number form-control" id="contact_number" >
                                </div>
                                <div class="form-group ">
                                    <label for="nid">NID</label>
                                    <input type="number" name="nid" class="nid form-control" id="nid" >
                                </div>
                                <div class="form-group ">
                                    <label for="birth_c">Birth Certificate</label>
                                    <input type="number" name="birth_c" class="birth_c form-control" id="birth_c">
                                </div>
                                <div class="form-group ">
                                    <label for="passport_no">Passport no</label>
                                    <input type="number" name="passport_no" class="form-control passport_no" id="passport_no">
                                </div>
                            </div>
                            <div class="form-row col-xl-6 text-content">
                                <div class="form-group ">
                                    <h5>Profile Image</h5>
                                </div>
                                <div class="form-group ">
                                    <input type="file" name="profile_image" class="profile_image form-control" id="profile_image" />
                                </div><br>
                                <div class="form-group ">
                                    <h5>Bio</h5>
                                </div>
                                <div class="form-group ">
                                    <textarea name="bio" id="" class="bio form-control" cols="40" rows="4" ></textarea>
                                </div>
                            </div>

                        </div><br>
                        <div class="form-row col-xl-6">
                            <div class="form-group ">
                                <h5>Address Info</h5>
                            </div>
                            <div class="form-group ">
                                <label for="country">Country</label>
                                <input type="text" name="country" class="country form-control" id="country" >
                            </div>
                            <div class="form-group ">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="address form-control" id="address" >
                            </div>
                            <div class="form-group ">
                                <label for="text">State</label>
                                <input type="text" name="state" class="state form-control" id="state" >
                            </div>
                            <div class="form-group ">
                                <label for="city">City</label>
                                <input type="text" name="city" class="city form-control" id="city">
                            </div>
                            <div class="form-group ">
                                <label for="zip_code">Zip Code</label>
                                <input type="number" name="zip_code" class="form-control zip_code" id="zip_code">
                            </div>
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
