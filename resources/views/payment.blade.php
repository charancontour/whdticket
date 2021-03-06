@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Payment</div>

				<div class="panel-body">
					<table class="table table-striped table-bordered" width="100%">
						<tr>
							<td>Name</td>
							<td>{{$registration->name}}</td>
						</tr>
						<tr>
							<td>Phone Number</td>
							<td>{{$registration->phonenumber}}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>{{$registration->email}}</td>
						</tr>
						<tr>
							<td>Organization</td>
							<td>{{$registration->organization}}</td>
						</tr>
						<tr>
							<td>Designation</td>
							<td>{{$registration->designation}}</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>{{$registration->address}}</td>
						</tr>
						<tr>
							<td>City</td>
							<td>{{$registration->city}}</td>
						</tr>
						<tr>
							<td>State</td>
							<td>{{$registration->state}}</td>
						</tr>
						<tr>
							<td>Zipcode</td>
							<td>{{$registration->zipcode}}</td>
						</tr>
						<tr>
							<td>Country</td>
							<td>{{$registration->country}}</td>
						</tr>	
						<tr>
							<td>Ticket Issued</td>
							<td>{{$registration->ticket->description}}</td>
						</tr>
						@if($registration->ticket_id != 3)
						<tr>
							<td>Number Of Tickets</td>
							<td>{{$registration->number_of_tickets}}</td>
						</tr>					
						@endif
						<tr>
							<td>Ticket Amount</td>
							<td>{{$registration->amount}}</td>
						</tr>
						<tr>
							<td colspan="2"  class="payment-options-heading">Payment Options</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center">
								<form method="post" action="/paytm">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="registration_id" value="{{$registration->id}}">
									<div class="form-group">										
										<input type="submit" name="payment_method" value="Paytm">
										<input type="submit" name="payment_method" style="margin-left: 10px" value="PayUmoney">
										<!-- <a href="#" class="payment-link">PayUmoney</a>									 -->
										<a href="https://www.plexusmd.com/event/WHDS17" class="payment-link">PlexusMD</a>										
									</div>
								</form>
							</td>
						</tr>												
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
