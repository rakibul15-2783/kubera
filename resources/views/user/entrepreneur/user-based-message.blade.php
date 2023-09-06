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
    <section style="background-color: #eee;">
        <div class="container py-5">

          <div class="row">
            <div class="col-md-6 col-lg-7 col-xl-8">

                <div style="max-height: 800px; overflow-y: auto;">
                    <ul class="list-unstyled">

                        @foreach ($conversations as $conversation)
                            @if ($conversation->user->role == 1 )
                                <li class="mb-4 d-flex justify-content-between">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                                        class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                                    <div class="card w-100">
                                        <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">Investor id = {{ $conversation->user_id }}</p>
                                            <p class="text-muted small mb-0"><i class="far fa-clock"></i> </p>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0">
                                                {{ $conversation->conversation }}
                                            </p>
                                        </div>
                                    </div>

                                </li>
                             @else
                                <li class="mb-4 d-flex justify-content-between">

                                    <div class="card w-100">
                                        <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">Me</p>
                                            <p class="text-muted small mb-0"><i class="far fa-clock"></i> </p>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0">
                                                {{ $conversation->conversation }}
                                            </p>
                                        </div>
                                    </div>
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                                    class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                                </li>
                            @endif

                        @endforeach


                        <form action="{{ route('entrepreneur.message.post',['messageId' => $message->id]) }}" method="POST">
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
                @if ($errors->has('subscription'))
                    <div class="alert alert-danger">
                        {{ $errors->first('subscription') }}
                    </div>
                @endif
                @if ($errors->has('points'))
                    <div class="alert alert-danger">
                        {{ $errors->first('points') }}
                    </div>
                @endif

            </div>



          </div>

        </div>
      </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
