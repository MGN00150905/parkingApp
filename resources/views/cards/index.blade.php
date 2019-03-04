@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
</head>
<div class = "container">
	<div class = "row">
		<div class = "col-md-12">

			@if(Session::has('message'))
			<p class = "alert alert-success">{{Session::get('message')}}</p> 
			@endif

			<div class = "panel-default">
				<div class = "panel-heading">
					
					<a href= "{{ route('cards.create') }}" class = "btn btn-link" > Enter Details </a>
				</div>


				<div class = "panel-body">
					@if (count($cards) === 0)

					<p>There are no registered cars on your account! </p>

					@else
					<div class = "panel panel-default">
						<div class = "panel-heading">
						</div>
					<table class = "table table-hover">
						<thead>
							<th>Registered</th>
						</thead>
						<tbody>
							@foreach ($cards as $card)
							<tr>
								<td>{{ $card -> name}}</td>
								<td>
									<a href = ""
									   class = "btn btn-default"> PAY </a>

								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					@endif
				</div>
			</div>
		</div>		
	</div>
</div>

@endsection