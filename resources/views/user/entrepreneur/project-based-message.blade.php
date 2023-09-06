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
 @include('user.dashboard')
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
          <h5 class="font-weight-bold mb-3 text-center text-lg-start">Message</h5>
        @if ($messages->isEmpty())
            <div class="text-success">
                No messages available
            </div>
        @else
            @foreach ($messages as $message)
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="p-2 border-bottom" style="background-color: #eee;">
                                <a href="{{ route('entrepreneur.message',['messageId' => $message->id]) }}" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar"
                                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                                        <div class="pt-1">
                                            <p class="fw-bold mb-0">{{ $message->user->name }}</p>
                                            <p class="small text-muted"></p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1"></p>
                                        <span class="badge bg-danger float-end">1</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif


        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
