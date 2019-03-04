@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
</head>
<div class = "container">
	<div class = "row">
    @if(Session::has('message'))
            <p class = "alert alert-success">{{Session::get('message')}}</p> 
            @endif
	<div class = "col-md-5">
	<div class="panel panel-default">
	<div class="panel-body">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
     <div class = "form-group">
	<label for="car">Car</label>
        <select class="form-control" name="car" id="car" data-parsley-required="true">
          @foreach ($cars as $car) 
          {
            <option value="{{ $car->id }}">{{ $car->reg }}</option>
          }
          @endforeach
        </select>

    <label for="park">Car Park</label>
        <select class="form-control" name="park" id="park" data-parsley-required="true">
          @foreach ($parks as $park) 
          {
            <option value="{{ $park->id }}">{{ $park->location }}</option>
          }
          @endforeach
        </select>

    <label for="card">Card</label>
        <select class="form-control" name="card" id="card" data-parsley-required="true">
          @foreach ($cards as $card) 
          {
            <option value="{{ $card->id }}">{{ $card->name }}</option>
          }
          @endforeach
        </select>

     <label for="num_hours">Number of hours</label>
        <select class="form-control" name="num_hours" id="num_hours" data-parsley-required="true">

            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>

        </select>

	
	<a href= ""><button class = "btn btn-primary btn-lg " > Pay Now </button> </a>


	</div>

    </div>
    </div>
	</div>



 	<div class = "col-md-7">
  		<div class = "panel-default">
                <div class = "panel-heading">
                    Cards
                    <a href= "{{ route('cards.create') }}" class = "btn btn-link" > Add card? </a>
                </div>


                <div class = "panel-body">
                    @if (count($cards) === 0)

                    <p>There are no Cards </p>

                    @else

                    <table class = "table table-hover">
                        <thead>
                            
                            <th>Card Name</th>
                        </thead>
                        <tbody>
                            @foreach ($cards as $card)
                            <tr>
                                
                                <td>{{ $card -> name}}</td>
                                <td>
                                    <a href = "{{ route('cards.show', array('card' => $card))}}"
                                       class = "btn btn-default"> View </a>
                                    <a href = "{{ route('cards.edit', array('card' => $card))}}"
                                       class = "btn btn-warning"> Edit </a>
                                    <form style = "display:inline-block" method = "POST" action= "{{ route('cards.destroy', array('card' => $card))}}">
                                    <input type="hidden" name="_method" value = "DELETE">
                                    <input type="hidden" name="_token" value = "{{ csrf_token() }}">
                                    <button type = "submit" class = "form-control btn btn-danger">Delete</a>    
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
  	</div>

  	</div>
</div>
@endsection