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
<section style="background-color: #eee;">
    <div class="container py-5">

      <div class="row">

        <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0 card">

            <div class=" ">
                <h3>Project Details</h3>
            </div>
            <div class=" ">
                <b><span >Project id: </span></b><span> ##000{{ $project->id }}</span>
            </div>
            <div class=" ">
                <b><span >Entrepreneur Name: </span></b><span>{{ $project->user->name }}</span>
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

        <div class="col-md-6 col-lg-7 col-xl-8">

          <ul class="list-unstyled">
            @if($conversations != null)
                @foreach ($conversations as $conversation)
                @if ($conversation->user->role == 1 )
                <li class="d-flex justify-content-between mb-4">
                    <div class="card w-100">
                    <div class="card-header d-flex justify-content-between p-3">
                        <p class="fw-bold mb-0">{{ $conversation->user_id }}</p>
                        <p class="text-muted small mb-0"><i class="far fa-clock"></i> </p>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">
                            {{ $conversation->conversation }}
                        </p>
                    </div>
                    </div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                    class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                </li>

                @else
                <li class=" mb-4">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                    class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                    <div class="card">
                    <div class="card-header d-flex justify-content-between p-3">
                        <p class="fw-bold mb-0">{{ $conversation->user_id }}</p>
                        <p class="text-muted small mb-0"><i class="far fa-clock"></i> </p>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">
                            {{ $conversation->conversation }}
                        </p>
                    </div>
                    </div>
                </li>
                @endif
                @endforeach
             @endif

            <form action="{{ route('investor.message.post',['projectId' => $project->id]) }}" method="POST">
                @csrf
                <li class="bg-white mb-3">
                <div class="form-outline">
                    <input type="text" name="message" class="form-control p-4"  placeholder="Message here...">
                </div>
                </li>
                <button type="submit" class="btn btn-info btn-rounded float-end">Send</button>
            </form>
          </ul>

        </div>

      </div>

    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
