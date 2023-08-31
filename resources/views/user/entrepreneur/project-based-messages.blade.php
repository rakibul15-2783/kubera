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

        <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

          <h5 class="font-weight-bold mb-3 text-center text-lg-start">Member</h5>

          <div class="card">
            <div class="card-body">

              <ul class="list-unstyled mb-0">
                @foreach ($messages as $message)
                <li class="p-2 border-bottom" style="background-color: #eee;">
                    <a href="{{ route('entrepreneur.message',['messageId' => $message->id]) }}" class="d-flex justify-content-between">
                      <div class="d-flex flex-row">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar"
                          class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                        <div class="pt-1">
                          <p class="fw-bold mb-0">{{ $message->user->name }}</p>
                          <p class="small text-muted">Hello, Are you there?</p>
                        </div>
                      </div>
                      <div class="pt-1">
                        <p class="small text-muted mb-1">Just now</p>
                        <span class="badge bg-danger float-end">1</span>
                      </div>
                    </a>
                  </li>
                @endforeach
                {{-- <li class="p-2 border-bottom">
                  <a href="#!" class="d-flex justify-content-between">
                    <div class="d-flex flex-row">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-1.webp" alt="avatar"
                        class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0">Danny Smith</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">5 mins ago</p>
                    </div>
                  </a>
                </li>
                <li class="p-2 border-bottom">
                  <a href="#!" class="d-flex justify-content-between">
                    <div class="d-flex flex-row">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-2.webp" alt="avatar"
                        class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0">Alex Steward</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">Yesterday</p>
                    </div>
                  </a>
                </li>
                <li class="p-2 border-bottom">
                  <a href="#!" class="d-flex justify-content-between">
                    <div class="d-flex flex-row">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp" alt="avatar"
                        class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0">Ashley Olsen</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">Yesterday</p>
                    </div>
                  </a>
                </li>
                <li class="p-2 border-bottom">
                  <a href="#!" class="d-flex justify-content-between">
                    <div class="d-flex flex-row">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-4.webp" alt="avatar"
                        class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0">Kate Moss</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">Yesterday</p>
                    </div>
                  </a>
                </li>
                <li class="p-2 border-bottom">
                  <a href="#!" class="d-flex justify-content-between">
                    <div class="d-flex flex-row">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                        class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0">Lara Croft</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">Yesterday</p>
                    </div>
                  </a>
                </li>
                <li class="p-2">
                  <a href="#!" class="d-flex justify-content-between">
                    <div class="d-flex flex-row">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                        class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0">Brad Pitt</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">5 mins ago</p>
                      <span class="text-muted float-end"><i class="fas fa-check" aria-hidden="true"></i></span>
                    </div>
                  </a>
                </li> --}}
              </ul>

            </div>
          </div>

        </div>



      </div>

    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
