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
    @include('user.dashboard')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h5>Dashboard / my project</h5>
            </div>
        </div>
        <div>
            <a href="{{ route('add.project') }}" class="btn btn-info"> Add Project</a>
            @if ($errors->has('subscription'))
                <div class="text-danger p-0">
                    {{ $errors->first('subscription') }}
                    <a href="{{ route('subscription') }}">Here is the subscription page</a>
                </div>
            @endif
        </div><br>

        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <form action="{{ route('project.search') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control" name="search" placeholder="Search by project title / category..." type="text">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-info">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><br>
        @if(!$projects->isEmpty())
            <div class="card shadow">
                <ul class="list-group">
                    <li class="list-group-item list-group-item">
                        <div class="row">
                            <div class="col-md-1"><b>SL</b></div>
                            <div class="col-md-1"><b>Project Id</b></div>
                            <div class="col-md-2"><b>Title</b></div>
                            <div class="col-md-2"><b>Category</b></div>
                            <div class="col-md-2"><b>Details</b></div>
                            <div class="col-md-2"><b>Date</b></div>
                            <div class="col-md-2"><b>Action</b></div>
                        </div>
                    </li>

                    @php
                        $sl = 1;
                    @endphp

                    @foreach ($projects as $project)
                        <li class="list-group-item list-group-item">
                            <div class="row">
                                <div class="col-md-1">{{ $sl++ }}</div>
                                <div class="col-md-1">#000{{ $project->id }}</div>
                                <div class="col-md-2">{{ $project->projectDetails->project_title }}</div>
                                <div class="col-md-2">{{ $project->projectDetails->project_category }}</div>
                                <div class="col-md-2"><a href="{{ route('my.project.details',['id' => $project->id]) }}" >Details</a></div>
                                <div class="col-md-2">{{ $project->created_at->format('Y-m-d') }}</div>
                                <div class="col-md-2">
                                    <a href="{{ route('entrepreneur.messages',['projectId' => $project->id]) }}" class="btn btn-warning btn-sm">Message</a>
                                    <a href="{{ route('edit.project',['id' => $project->id]) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ route('delete.project',['id' => $project->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="alert alert-success">
                <span>Project not available</span>
            </div>
        @endif

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
