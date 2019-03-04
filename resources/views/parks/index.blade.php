@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
</head>
<div class="container">
    <div class = "col-md-5">

    <label for="Carparks">Carpark</label>
        <select class="form-control" name="carpark" id="carpark" data-parsley-required="true">
          @foreach ($carparks as $cp) 
          {
            <option value="{{ $cp }}" > {{ $cp }}</option>
          }
          @endforeach
        </select>

</div>
</div>
@endsection
