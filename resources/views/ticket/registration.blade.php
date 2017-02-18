@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Register Now!!</div>

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
							<label class="col-md-4 control-label">Name*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address*</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Phone/Mobile*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Organization*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="organization" value="{{ old('organization') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Designation*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="designation" value="{{ old('designation') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Address*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">City*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="city" value="{{ old('city') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">State*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="state" value="{{ old('state') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Zip/Postcode*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}" required>
							</div>
						</div>						

						<div class="form-group">
							<label class="col-md-4 control-label">Country*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="country" value="{{ old('Country') }}" required>
							</div>
						</div>
						
						@foreach($tickets as $ticket)
							<div class="form-group">
							    <label class="col-md-4 control-label"></label>
							    <div class="col-md-6">
								    <input type="radio" class="form-check-input" name="ticket_id" id="optionsRadios1" value="{{$ticket->id}}" required>
								    {{$ticket->description}}
							    </div>					        
						    </div>
					    @endforeach
					    

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
