<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kubera | Entrepreneur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<h2></h2>
<div class="container">
    <div class="row">
        <h2>Your Project Information</h2>
        <div class="container">
            <div class="col-md-12 col-lg-12  p-3">
                <div class="row card">
                    <div class="col-lg-6">
                        <div class=" ">
                            <h3>Project Details</h3>
                        </div>
                        <div class=" ">
                            <b><span >Project id: </span></b><span> ##000{{ $project->id }}</span>
                        </div>
                        <div class=" ">
                            <b><span >Project Title: </span></b><span> {{ $project->projectDetails->project_title }}</span>
                        </div>
                        <div class=" ">
                            <b><span >Project Category: </span></b><span> {{ $project->projectDetails->project_category }}</span>
                        </div>
                        <div class=" ">
                            <b><span >Project Description:</span></b><span> {{ $project->projectDetails->description }}</span>
                        </div>
                        <div class=" ">
                            <b><span >Estimate Budget: </span></b><span> {{ $project->projectDetails->estimate_budget }}</span>
                        </div>
                        <div class=" ">
                            <b><span >Donation Amount: </span></b><span>{{ $project->projectDetails->donation_amount }}</span>
                        </div>
                        <div class=" ">
                            <b><span >Percentage of Completion: </span></b><span> {{ $project->projectDetails->prcentage_of_completion }}</span>
                        </div>
                        <div class=" ">
                            <b><span >Team Members: </span></b><span> {{ $project->projectDetails->team_members }}</span>
                        </div>
                        <div class=" ">
                            <b><span >Entrepreneur Role: </span></b><span> {{ $project->projectDetails->your_role }}</span>
                        </div>
                        <div class=" ">
                            <b><span >Document: </span></b><span> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>

