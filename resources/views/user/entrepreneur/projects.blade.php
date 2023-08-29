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
            <div class="col-lg-8">
                <h2>Dashboard / project</h2>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('logout') }}">log out</a>
            </div>
        </div>

        <div>
            <a href="{{ route('add.project') }}" class="btn btn-info"> Add Project</a>
        </div><br>

        @if(!$projects->isEmpty())
        <div class="card shadow">
            <ul class="list-group">
                <li class="list-group-item list-group-item">
                    <div class="row">
                        <div class="col-md-3"><b>SL</b></div>
                        <div class="col-md-3"><b>Title</b></div>
                        <div class="col-md-3"><b>Details</b></div>
                        <div class="col-md-3"><b>Date</b></div>
                    </div>
                </li>

                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($projects as $project)
                    <li class="list-group-item list-group-item">
                        <div class="row">
                            <div class="col-md-3">{{ $sl++ }}</div>
                            <div class="col-md-3">{{ $project->projectDetails->project_title }}</div>
                            <div class="col-md-3"><a href="" class="btn btn-sm btn-info">Details</a></div>
                            <div class="col-md-3">{{ $project->created_at->format('Y-m-d') }}</div>
                        </div>
                    </li>
                    @endforeach
                @else
                <div>
                    <span>Project not available</span>
                </div>
                @endif
            </ul>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
