@extends('dashboard.layout')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-ticket fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$corperate_ticket->tickets_sold}}</div>
                            <div>{{$corperate_ticket->title}}</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-ticket fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$ngo_ticket->tickets_sold}}</div>
                            <div>{{$ngo_ticket->title}}</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-ticket fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$sponser_ticket->tickets_sold}}</div>
                            <div>{{$sponser_ticket->title}}</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
	</div>
	<div class="row">
		<table class="table table-striped table-responsive">
			<tr>
				<th>Name</th>
				<th>Ticket Issued</th>
				<th>Email</th>
				<th>Amount Paid</th>
				<th>Transaction Details</th>
			</tr>
			@foreach($registrations as $registration)
			<tr>
				<td>{{$registration->name}}</td>
				<td>{{$registration->ticket->title}}</td>
				<td>{{$registration->email}}</td>
				<td>{{$registration->amount}}</td>
				<td><a href="/ticket/details/{{$registration->id}}"><button class="btn btn-large btn-success">View</button></a></td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection