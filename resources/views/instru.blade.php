@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Instructions</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date().getTime();
countDownDate= countDownDate + {{$data*1000}};

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate-now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("time").innerHTML ="Time left:" + days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("time").innerHTML = "Refresh Page to View Exam";
    }
}, 1000);
</script>
                    <h1 id="time" align="center"></h1>
                    <p>
                        <ol>
                            <li>No negative marking</li>
                            <li>Please enable cookies for smooth performance.</li>
                            <li>The examination will be of 10 minutes.</li>
                        </ol>
                    </p>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
