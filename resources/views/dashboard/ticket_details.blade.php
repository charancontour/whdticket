@extends('dashboard.layout')
@section('content')

<div class="row">
	<div class="col-md-6">
		
		<div class="panel panel-warning">
			<div class="panel-heading">
				Personal Details
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead></thead>
					<tbody>
						@foreach($registration_details as $key => $value)
							<tr>
								<td>{{$key}}</td>
								<td>{{$value}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	<div class="col-md-6">
		
		<div class="panel panel-success">
			<div class="panel-heading">
				Payment Details
			</div>
			<div class="panel-body">
				@if($payment_details)
					<table class="table table-striped">
					<tbody>
					@foreach($payment_details as $key => $value)
						<tr>
							<td>{{$key}}</td>
							<td>{{$value}}</td>
						</tr>							
					@endforeach
					</tbody>
					</table>
				@else
					<h3>Payment Not done Yet.</h3>
				@endif
			</div>
		</div>
		
	</div>
</div>

@endsection