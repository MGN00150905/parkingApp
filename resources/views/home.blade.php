@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
</head>
<div class="container">
    <div class="row">
    @if(Session::has('message'))
            <p class = "alert alert-success">{{Session::get('message')}}</p> 
            @endif
        <div class="col-md-6">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href= "{{ route('payments.index') }}"><button class = "btn btn-primary btn-lg " > Proceed </button> </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class = "panel-default">
                <div class = "panel-heading">
                    Cars
                    <a href= "{{ route('cars.create') }}" class = "btn btn-link" > Add car? </a>
                </div>


                <div class = "panel-body">
                    @if (count($cars) === 0)

                    <p>There are no Cars </p>

                    @else

                    <table class = "table table-hover">
                        <thead>
                            
                            <th>Registration Number</th>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                            <tr>
                                
                                <td>{{ $car -> reg}}</td>
                                <td>
                                    <a href = "{{ route('cars.show', array('car' => $car))}}"
                                       class = "btn btn-default"> View </a>
                                    <a href = "{{ route('cars.edit', array('car' => $car))}}"
                                       class = "btn btn-warning"> Edit </a>
                                    <form style = "display:inline-block" method = "POST" action= "{{ route('cars.destroy', array('car' => $car))}}">
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
