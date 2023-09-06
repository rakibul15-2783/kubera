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
        </div><br>

        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <form action="" method="GET">
                    <div class="input-group">
                        <input class="form-control" name="search" placeholder="Search by email..." type="text">
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
                            <div class="col-md-3"><b>Title</b></div>
                            <div class="col-md-2"><b>Details</b></div>
                            <div class="col-md-3"><b>Date</b></div>
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
                                <div class="col-md-3">{{ $project->projectDetails->project_title }}</div>
                                <div class="col-md-2"><a href="{{ route('my.project.details',['id' => $project->id]) }}" class="btn btn-sm btn-info">Details</a></div>
                                <div class="col-md-3">{{ $project->created_at->format('Y-m-d') }}</div>
                                <div class="col-md-2">
                                    <a href="{{ route('entrepreneur.messages',['projectId' => $project->id]) }}" class="btn btn-info btn-sm">Message</a>
                                    <a href="{{ route('edit.project',['id' => $project->id]) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ route('delete.project',['id' => $project->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                    {{-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $project->id }}">Delete</button> --}}
                                </div>

                            </div>
                        </li>
                        {{-- <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Project Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                Are you want to sure delete this project?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <a href="{{ route('delete.project',['id' => $project->id]) }}"  class="btn btn-danger">Yes</a>
                                </div>
                            </div>
                            </div>
                        </div> --}}
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
