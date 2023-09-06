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
    @include('user.dashboard')
<div class="container">
    <h2>Projects</h2>
    @foreach ($projects as $project)
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <span>Project id: #000{{ $project->id }}</span>
                    </div>
                    <div class="card-body">
                        <strong class="card-title">Project Title: </strong><br>{{ $project->projectDetails->project_title }} <br>
                        <strong class="card-text">Project Description: </strong><br>{{ $project->projectDetails->description }} <br>
                        <a href="{{ route('project.info',['id' => $project->id]) }}" class="btn btn-info">Details</a>
                    </div>
                </div>
            </div>
        </div><br>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>

