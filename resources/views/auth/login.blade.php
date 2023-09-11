<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kubera</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
                <div class="col-sm-12 col-lg-6 mx-auto my-4">
                    <div class="card m-4 p-4">
                        <form action="{{ route('login.post') }}" method="post">
                            @csrf
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <div class="form-outline mb-4">
                                    <h3 class="text-center">Login Here</h3>
                                </div>
                                <div class="form-outline mb-4">
                                <input type="email" name="email" id="" class="form-control" required/>
                                <label class="form-label" for="">Email address</label>
                                    <div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                <input type="password" name="password" id="" class="form-control" required/>
                                <label class="form-label" for="">Password</label>
                                    <div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    @error('disable')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="remember" id="remember" checked />
                                        <label class="form-check-label" for="remember"> Remember me </label>
                                    </div> --}}
                                </div>

                                <div class="col">
                                    <a href="#!">Forgot password?</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                                </div>
                        </form>
                                <div class="text-center">
                                    <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
                                </div>
                    </div>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>
