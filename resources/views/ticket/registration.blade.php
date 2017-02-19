@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Register Now</div>

				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name	<span>*</span></label>
							
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address	<span>*</span></label>
							
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Phone/Mobile	<span>*</span></label>
							
								<input type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Organization	<span>*</span></label>
							
								<input type="text" class="form-control" name="organization" value="{{ old('organization') }}" required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Designation	<span>*</span></label>
							
								<input type="text" class="form-control" name="designation" value="{{ old('designation') }}" required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Address	<span>*</span></label>
							
								<input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">City	<span>*</span></label>
							
								<input type="text" class="form-control" name="city" value="{{ old('city') }}" required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">State	<span>*</span></label>
							
								<input type="text" class="form-control" name="state" value="{{ old('state') }}" required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Zip/Postcode	<span>*</span></label>
							
								<input type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}" required>
							
						</div>						

						<div class="form-group">
							<label class="col-md-4 control-label">Country	<span>*</span></label>
							
								<input type="text" class="form-control" name="country" value="{{ old('Country') }}" required>
							
						</div>
						<br>
						<h3 style = 'text-align:center'>Tickets</h3>
						<br>
						@foreach($tickets as $ticket)
							<div class="">															    
								<input type="radio" class="form-check-input" name="ticket_id" id="optionsRadios1" value="{{$ticket->id}}" required>
								{{$ticket->description}}
								@if($ticket->amount == 0)
								<input type="number" name="amount">
								@endif								
						    </div>
					    @endforeach	
					    <br>				    

						<div class="form-group">
							<input type="submit" value="Register">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
