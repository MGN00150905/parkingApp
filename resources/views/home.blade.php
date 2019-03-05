    @extends('layouts.app')

    @section('content')
    <head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">        
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src = "{{asset('js/jquery-3.3.1.min.js')}}"></script>

    </head>

    <body>
        <div class="container">
            <div class="row">
            @if(Session::has('message'))
                    <p class = "alert alert-info">{{Session::get('message')}}</p> 
                    @endif
                <div class="col-md-2">
                    <div class=" panel-default">

                        <div class="panel">
                            @if (session('status'))
                                <div class="alert alert-info">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <a href= "{{ route('payments.index') }}">
                                <button style="width: 163px;" class = "btn btn-primary"> 
                                    <h2> Proceed </h2> 
                                </button> 
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                        @if (count($payments) === 0)

                        <h1></h1>

                        @else

                    <div class = "panel panel-default">
                        <div class="panel-heading">
                            <h3 style="color:black;">Countdown Timer</h3>
                        </div>

                        <div class="panel-body">
                        <img class="img-circle" src = "{{ asset('img/timer.png') }}" style = "height:150px; margin-left:40px">
                            @foreach ($payments as $payment)
                                <div id="dep" type="hidden" style="font-size: 20px; color:#f7f4ea;">{{ $payment->departure }}</div>
                                <div id="outputDep" style="font-size: 30px; color:black; margin-left: 40px; margin-bottom: 30px;">{{ $payment->departure }}</div>
                            @endforeach
                        </div>


                       <!--  <div id="clock"></div> -->
                       <div id="demo"></div>

                       <script type="text/javascript">
                            // // Set the date we're counting down to
                            var countDownDate2 = $("#dep").text();


                            // var time = countDownDate.innerText;
                            var time = $("#dep").text();
                            // var countDownDate2;



                            var a = time;

                            console.log(a);
                            console.log("hours: ", a.substr(a.indexOf(":")-2, a.indexOf("::") +3));
                            console.log("min: ", a.substr(a.indexOf(":")+1, a.indexOf("::") +3));
                            console.log("secs: ", a.substr(a.indexOf(":")+4));

                            var b = toDate(a,"h:m");

                            console.log(b);


                            // alert(b);
                            function toDate(dStr,format) {
                                countDownDate2 = new Date();
                                if (format == "h:m") {
                                    countDownDate2.setHours(a.substr(a.indexOf(":")-2, a.indexOf("::") +3));
                                    countDownDate2.setMinutes(a.substr(a.indexOf(":")+1, a.indexOf("::") +3));
                                    countDownDate2.setSeconds(a.substr(a.indexOf(":")+4));
                                    return countDownDate2;
                                }else 
                                    return "Invalid Format";
                            }

                            //                     // Update the count down every 1 second
                            var x = setInterval(function() {

                                // Get todays date and time
                                var now = new Date().getTime();

                                // Find the distance between now an the count down date
                                var distance = countDownDate2 - now;

                                // Time calculations for days, hours, minutes and seconds
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                // Output the result in an element with id="demo"
                                document.getElementById("outputDep").innerHTML = hours + "h "
                                + minutes + "m " + seconds + "s ";

                                // If the count down is over, write some text 
                                if (distance < 0) {
                                    clearInterval(x);
                                    document.getElementById("outputDep").innerHTML = "Time up!";
                                }
                            }, 1000);
                       </script>


                        <script>
                            // $('[data-countdown]').each(function() {
                            //   var $this = $(this), finalDate = $(this).data('countdown');
                            //   $this.countdown(finalDate, function(event) {
                            //     $this.html(event.strftime('%H:%M:%S'));
                            //   });
                            // });

                            // $('#clock').countdown("2020/10/10", function(event) {
                            //   var totalHours = event.offset.totalDays * 24 + event.offset.hours;
                            //   $(this).html(event.strftime(totalHours + ' hr %M min %S sec'));
                            // });
                        </script>

                    </div>
                    @endif
            </div>
                <div class="col-md-3">
                        @if (count($payments) === 0)
                        <div class = "panel panel-default">
                            <div class="panel-heading">
                                <h3 style="color: black;">Payments</h3>
                            </div>
                            <div class = "panel-body">
                                <h4 style="color: black;">There are no payments</h4>
                                <h4 style="color: black;">Please proceed to pay for your parking</h4>
                            </div>    
                        </div>
                        @else
                        <div class = "panel panel-default">
                            <div class="panel-heading">
                                <h3 style="color: black;">Parked Cars</h3>
                            </div>
                            <div class = "panel-body">
                                @foreach ($payments as $payment)
                                <table class="table">
                                <tr>

                                    <td style="color: black; font-weight: bold;">Departure Time</td>
                                    <td style="color: black; font-weight: bold; " id="dep">{{ $payment -> departure}}</td>
                                    <td>
                                        <form style = "display:inline-block" method = "POST" action= "{{ route('payments.destroy', array('payment' => $payment))}}">
                                            <input type="hidden" name="_method" value = "DELETE">
                                            <input type="hidden" name="_token" value = "{{ csrf_token() }}">
                                            <button style = "height:60px;" type = "submit" class = "form-control but btn-primary">Finish Parking</button>    
                                        </form>
                                    </td>

                                </tr>
                                </table>
                                @endforeach
                            </div>
                        </div>
                        @endif
                </div>
                <div class="col-md-4">
                    <div class = "panel panel-default">
                        <div class = "panel-heading">
                            @if (count($cars) === 0)

                            <h3 style="color: black;">There are no Cars </h3>
                        </div>
                        @else
                        <div class="panel-heading">
                          <h3 style="color: black;">Cars</h3>
                        </div>
                            <div class="panel-body">
                                @foreach ($cars as $car)
                                <h4 style="color: black;">Reg Number</h4>
                                <table class="table">    
                                    <td style="color: black; font-weight: bold;">{{ $car -> reg}}</td>
                                    <td>
                                        <a href = "{{ route('cars.edit', array('car' => $car))}}"
                                           class = "btn btn-default"> Edit </a>
                                        <form style = "display:inline-block" method = "POST" action= "{{ route('cars.destroy', array('car' => $car))}}">
                                        <input type="hidden" name="_method" value = "DELETE">
                                        <input type="hidden" name="_token" value = "{{ csrf_token() }}">
                                        <button type = "submit" class = "form-control btn btn-warning">Delete</a>    
                                        </form>
                                    </td>
                                </table>
                                @endforeach
                            </div>
                        @endif
                        <div class = "panel-heading">

                            <a href= "{{ route('cars.create') }}" class = "btn" >
                            <h4 style="color: black;">Add car?</h4> </a>
                            <img class="img-circle img1" src = "{{ asset('img/car.png') }}">
                            
                        </div
                    </div>
                </div>
            </div>
        </div>
    </body>
    @endsection
