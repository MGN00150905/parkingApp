@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
</head>
<div class = "container">
    <div class = "row">
        <div class = "col-md-8 col-md-offset-2">
            <div class = "panel panel-default">
                <div class = "panel-heading">
                    Enter your Details
                </div>


                <div class = "panel-body">
                    @if ($errors -> any())
                        <div class ="alert alert-danger">
                            <ul>
                                @foreach ($errors ->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method ="POST" action = "{{ route('cards.store')}}">
                        <input type="hidden" name="_token" value = "{{ csrf_token() }}">
                        <div>
                            <label for = "card">Name for Card</label>
                            <input type="text" class ="form-control" id = "name" name="name" value = "{{ old('name') }}">
                        <div>
                        <div>
                            <label for = "card">Address</label>
                            <input type="text" class ="form-control" id = "address" name="address" value = "{{ old('address') }}">
                        <div>
                        <div>
                            <label for = "card">Card Number</label>
                            <input type="text" class ="form-control" id = "card_number" name="card_number" value = "{{ old('card_number') }}">
                        <div>
                        <div>
                            <label for = "card">Expiry Date</label>
                            <input type="text" class ="form-control" id = "ex_date" name="ex_date" value = "{{ old('ex_date') }}">
                        <div>
                        <div>
                            <label for = "card">CVV</label>
                            <input type="text" class ="form-control" id = "cvv" name="cvv" value = "{{ old('cvv') }}">
                        <div>
                        <a href = "{{route('payments.index')}}" class = "btn btn-default">Cancel</a>
                        <button type ="submit" class = "btn btn-primary pull-right">Save Card</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>		
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
@endsection