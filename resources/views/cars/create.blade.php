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
					<form method ="POST" action = "{{ route('cars.store')}}">
						<input type="hidden" name="_token" value = "{{ csrf_token() }}">
						<div>
							<label for = "reg">Registration Plate</label>
							<input type="text" class ="form-control" id = "reg" name="reg" value = "{{ old('reg') }}">
						<div>
						<a href = "{{route('home')}}" class = "btn btn-default">Cancel</a>
						<button type ="submit" class = "btn btn-primary pull-right">Save Car</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>

@endsection