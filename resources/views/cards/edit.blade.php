
@extends('layouts.app')

@section('content')
<div class = "container">
	<div class = "row">
		<div class = "col-md-8 col-md-offset-2">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					Edit Card
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
					<form method ="POST" action = "{{ route('cards.update', array('card' => $card)) }}">
						<input type="hidden" name="_method" value = "PUT">
						<input type="hidden" name="_token" value = "{{ csrf_token() }}">
						<div>
							<label for = "reg">Name for Card</label>
							<input type="text" class ="form-control" id = "name" name="name" value = "{{ old('name') }}">
						<div>
						<div>
							<label for = "reg">Address</label>
							<input type="text" class ="form-control" id = "address" name="address" value = "{{ old('address') }}">
						<div>
						<div>
							<label for = "reg">Card Number</label>
							<input type="text" class ="form-control" id = "card_number" name="card_number" value = "{{ old('card_number') }}">
						<div>
						<div>
							<label for = "reg">Expiry Date</label>
							<input type="text" class ="form-control" id = "ex_date" name="ex_date" value = "{{ old('ex_date') }}">
						<div>
						<div>
							<label for = "reg">CVV</label>
							<input type="text" class ="form-control" id = "cvv" name="cvv" value = "{{ old('cvv') }}">
						<div>
						<div>
						<a href = "{{route('cars.index')}}" class = "btn btn-default">Cancel</a>
						<button type ="submit" class = "btn btn-primary pull-right">Submit</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>

@endsection
