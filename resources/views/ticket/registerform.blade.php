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
							
								<input type="text" class="form-control" name="name" 
								@if(isset($input['name']))
								value="{{ $input['name'] }}" 
								@else
								value="{{ old('name') }}"
								@endif
								required>
							
						</div>						
						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address	<span>*</span></label>
							
								<input type="email" class="form-control" name="email" 
								@if(isset($input['email']))
								value="{{ $input['email'] }}" 
								@else
								value="{{ old('email') }}"
								@endif
								required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Phone/Mobile	<span>*</span></label>
							
								<input type="text" class="form-control" name="phonenumber" 
								@if(isset($input['phonenumber']))
								value="{{ $input['phonenumber'] }}" 
								@else
								value="{{old('phonenumber')}}"
								@endif
								required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Organization	<span>*</span></label>
							
								<input type="text" class="form-control" name="organization" 								 
								@if(isset($input['organization']))
								value="{{ $input['organization'] }}" 
								@else
								value="{{old('organization')}}"
								@endif
								required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Designation	<span>*</span></label>
							
								<input type="text" class="form-control" name="designation" 
								@if(isset($input['designation']))
								value="{{ $input['designation'] }}" 
								@else
								value="{{old('designation')}}"
								@endif
								required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Address	<span>*</span></label>
							
								<input type="text" class="form-control" name="address" 								
								@if(isset($input['address']))
								value="{{ $input['address'] }}" 
								@else
								value="{{old('address')}}"
								@endif
								required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">City	<span>*</span></label>
							
								<input type="text" class="form-control" name="city" 
								@if(isset($input['city']))
								value="{{ $input['city'] }}" 
								@else
								value="{{old('city')}}"
								@endif
								required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">State	<span>*</span></label>
							
								<input type="text" class="form-control" name="state" 
								@if(isset($input['state']))
								value="{{ $input['state'] }}" 
								@else
								value="{{old('state')}}"
								@endif
								required>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Zip/Postcode	<span>*</span></label>
							
								<input type="text" class="form-control" name="zipcode" 
								@if(isset($input['zipcode']))
								value="{{ $input['zipcode'] }}" 
								@else
								value="{{old('zipcode')}}"
								@endif
								required>
							
						</div>						

						<div class="form-group">
							<label class="col-md-4 control-label">Country	<span>*</span></label>
							
								<input type="text" class="form-control" name="country" 
								@if(isset($input['country']))
								value="{{ $input['country'] }}" 
								@else
								value="{{old('country')}}"
								@endif
								required>
							
						</div>
						
						<div class="form-section-title">
							<h3>Tickets</h3>
						</div>

						@foreach($tickets as $key => $ticket)
							<?php $available_tickets = $ticket->total_tickets - $ticket->tickets_sold ?>
							<div class="form-group radios" >															    
								<label>
									<input type="radio" class="form-check-input" data-amount="{{$ticket->amount}}" name="ticket_id" id="optionsRadios1" value="{{$ticket->id}}" onchange='computeAmount()' required>
									<span>{{$ticket->description}}</span>
								</label>

								@if($ticket->amount == 0)
								<input type="number" min="1"   name="amount" onkeyup='computeAmount()'>
								@else
								<!-- ( Available Tickets :: {{$available_tickets}} ) -->
								<select type="number" name="number_of_tickets_{{$ticket->id}}" id="number_of_tickets_{{$ticket->id}}" onchange="computeAmount()">
									<?php for ($i=1; $i <= 5; $i++) { 
										echo "<option value='$i'>$i</option>";
									 } ?>
								</select>
								@endif
								
						    </div>
					    @endforeach	
					    <br>				    
					    <div class="form-group">
							<label class="col-md-4 control-label">Total Amount:	<i class="fa fa-inr" aria-hidden="true"></i> <span id="total_amount" style="color:inherit">0</span></label>														
						</div>						
						<div class="form-group">
							<input type="submit" value="Register">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function computeAmount() {
		var tickets = document.getElementsByName('ticket_id');
		var amount  = 0;
		for(var i=0;i<tickets.length;i++){
			if(tickets[i].checked){
				if(tickets[i].value == 3){
					amount = document.getElementsByName('amount')[0].value;
				}else{
					var no_of_tickets = document.getElementById('number_of_tickets_'+tickets[i].value).value;
					amount = parseInt(no_of_tickets) * parseInt(tickets[i].getAttribute('data-amount'));
				}
				break;
			}
		}
		document.getElementById('total_amount').innerHTML = amount;
		return;
	}
	
</script>
@endsection
