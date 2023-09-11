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
    {{-- <style>
        .nav-link.btn:hover {
        background-color: #17a2b8; /* Change to your desired hover background color */
        color: #fff; /* Change to your desired hover text color */
    }
    </style> --}}

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-info bg-info">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto "> <!-- Use mx-auto to center-align the links -->
                    @if (auth()->user()->role == 2)
                        @if (auth()->user()->user_verification_request =1 || auth()->user()->user_verified =1)
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('entrepreneur.profile') }}">Profile</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('my.project') }}">My Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('subscription') }}">Subscription</a>
                        </li>
                    @else
                        @if (auth()->user()->user_verification_request == 1 || auth()->user()->user_verified == 1)
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('investor.profile') }}">Profile</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('show.projects') }}">See Projects</a>
                        </li>
                    @endif
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('logout') }}">Logout</a>
                        </li>
                </ul>
            </div>
        </nav>
    </div>
    





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
