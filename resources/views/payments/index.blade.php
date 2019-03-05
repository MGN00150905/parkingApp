  @extends('layouts.app')

  @section('content')
  <head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/calculation.js')}}">
  </head>
  <div class = "container">
  	<div class = "row">
      @if(Session::has('message'))
      <p class = "alert alert-success">{{Session::get('message')}}</p> 
      @endif
      <div class = "col-md-6">
       <div class="panel panel-default" style="width:440px">
         <div class="panel-heading " style="width:440px">
           <h2 style="color:black;">Pay</h2>
         </div>
         <div class="panel-body " style="width:440px">

          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif

          <div class = "panel-bosdy">
           @if ($errors -> any())
           <div class ="alert alert-danger">
             <ul>
              @foreach ($errors ->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form method ="POST" action = "{{ route('payments.store')}}" id = "checkout_form">
           <input type="hidden" name="_token" value = "{{ csrf_token() }}">
           
       <label for="car"><h3 style="color:black">Car</h3></label>
       <select class="form-control " name="car" id="car" data-parsley-required="true" style="width:400px">
            @foreach ($cars as $car) 
            {
            <option data-price="{{ $car->reg }}" value="{{ $car->id }}">{{ $car->reg }}</option>
            }
            @endforeach
        </select>

        <label for="park"><h3 style="color:black">Car Park</h3></label>

        <select class="form-control " name="park" id="park" data-parsley-required="true" style="width:400px">
          @foreach ($parks as $park) 
          {
          <option data-price="{{ $park->price }}" value="{{ $park->id }}">{{ $park->location }}</option>
        }
        @endforeach
      </select>

      <div id = "charge_error" class = "alert alert-danger" {{ !Session::has('error') ? 'hidden' : ''}}>
        {{ Session::get('error') }}
      </div>

      <label for="card"><h3 style="color:black">Card</h3></label>
      <select class="form-control " name="card" id="card" data-parsley-required="true" style="width:400px">
        @foreach ($cards as $card) 
        {
        <option value="{{ $card->id }}">{{ $card->name }}</option>
      }
      @endforeach
    </select>

    <label for="num_hours"><h3 style="color:black">Number of hours</h3></label>
    <select class="form-control " name="num_hours" id="num_hours" data-parsley-required="true" style="width:400px">

      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>

    </select>

    <label for="amount"><h3 style="color:black">Amount<h3></label>
    <input class="form-control " type="text" readonly id="amount" name="amount" value="old" style="width:400px" />

    <label for="departure"><h3 style="color:black">Departure time</h3></label>
    <input class="form-control " type="text" readonly id="departure" name="departure" value="" style="width:400px" />

    
    <div class="panel top" style=" background-color:transparent;">
     <a href = "{{route('home')}}" class = "btn btn-default">Cancel</a>
     <button type ="submit" class = "btn btn-primary">Pay</button>
     <a class = "btn btn-primary pull-right" href="{{ url('/pay') }} ">Stripe Pay</a>
   </div>


  </form>
  </div>

  </div>
  </div>
  </div>



  <div class = "col-md-6">
    <div class = "panel panel-default">
      @if (count($cards) === 0)

      <h3 style="color:black">There are no Cards </h3>

      </div>
      @else


        <div class="panel panel-default">
          <div class="panel-heading">            
            <h2 style="color: black;">Cards</h2>
          </div>
          <div class="panel-body">
            @foreach ($cards as $card)
            <table class="table">
              <tr>
                
                <td style="color: black; font-weight: bold;">{{ $card -> name}}</td>
                <td>
                  <a href = "{{ route('cards.edit', array('card' => $card))}}"
                   class = "btn btn-default"> Edit </a>
                   <form style = "display:inline-block" method = "POST" action= "{{ route('cards.destroy', array('card' => $card))}}">
                    <input type="hidden" name="_method" value = "DELETE">
                    <input type="hidden" name="_token" value = "{{ csrf_token() }}">
                    <button type = "submit" class = "form-control btn btn-warning">Delete</a>    
                    </form>

                  </td>
                </tr>
              </table>
            </div>
              @endforeach
        </div>
        @endif
        <div class = "panel-hecading">
          <a href= "{{ route('cards.create') }}" class = "btn btn-link" ><h4 style="color: black;">Add card?</h4></a>
            <img class="img-circle img1" src = "{{ asset('img/card1.png') }}">
          
        </div>
        <label for="park-"><h4 style="color: black;">&nbsp;&nbsp;&nbsp;Find Carpark on Map&nbsp;&nbsp;</h4></label>
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Car Parks</button>
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('/stillo') }}">Stillorgan</li></a>
            <li><a href="{{ url('/dd') }}">Dundrum</li></a>
            <li><a href="{{ url('/') }}">IADT</li></a>
            <li><a href="{{ url('/bl') }}">Blackrock</li></a>
          </ul>
        </div>
        </div>

      </div>
    </div>
  </div>

  </div>
  </div>
  @endsection
  @section('scripts')
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  @endsection