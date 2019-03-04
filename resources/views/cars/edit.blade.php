@extends('layouts.app')

@section('content')
<div class = "container">
	<div class = "row">
		<div class = "col-md-8 col-md-offset-2">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					Edit Car
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
					<form method ="POST" action = "{{ route('cars.update', array('car' => $car)) }}">
						<input type="hidden" name="_method" value = "PUT">
						<input type="hidden" name="_token" value = "{{ csrf_token() }}">
						<div class = "form-group">
							<label for = "reg">Registration Plate</label>
							<input type="text" class ="form-control" id = "reg" name="reg" value = "{{ old('reg', $car -> reg ) }}">
						</div>
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