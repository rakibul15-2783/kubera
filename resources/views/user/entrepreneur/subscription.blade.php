<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kubera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>Dashboard / Subscription</h2>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('logout') }}">log out</a>
            </div>
        </div><br>
        <div class="row">
            @if ($subscription == null)
                <div class=" col-lg-6 card shadow p-4">
                    <span>You have no Subscription</span>
                </div>
            @else
                <div class=" col-lg-6 card shadow p-4">
                    <span>You have Subscription</span>
                    <span><b>Start Date: </b>{{ \Carbon\Carbon::parse($subscription->start_date)->format('Y-m-d') }}</span>
                    <span><b>Expired Date: </b>{{ \Carbon\Carbon::parse($subscription->end_date)->format('Y-m-d') }}</span>
                </div>
            @endif

            <div class=" col-lg-6 card shadow p-4">
                <form action="{{ route('purchase.subscription',['userId' => auth()->user()->id]) }}" method="Post">
                    @csrf

                    <div class="form-group">
                        <label for="subscription">Purchase Subscription</label>
                        <select class="form-control" name="plan_id" id="">
                            <option value="">----Choose Subscription----</option>
                            @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->plan_name }} - ${{ $plan->price }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-4">
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
        <br>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
