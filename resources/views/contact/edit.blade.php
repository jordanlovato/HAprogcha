@extends('layouts.master')

@section('title', 'Edit')

@section('content')
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="row" ng-app="contactValidator">
		<div class="col-md-12 col-xs-12">
			{!! Form::open(['action' => ['ContactController@update', $contact->_id], 'method' => 'put'])!!}

			<div class="row">

				<div class="col-md-6 col-xs-12">
				<div class="form-group">
				{!! Form::label('fname', 'First Name') !!}
				{!! Form::text('fname', $contact->fname, array('class' => 'form-control')) !!}
				</div>
				</div>

				<div class="col-md-6 col-xs-12">
				<div class="form-group">
				{!! Form::label('lname', 'Last Name') !!}
				{!! Form::text('lname', $contact->lname, array('class' => 'form-control')) !!}
				</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				{!! Form::label('email', 'Email') !!}
				{!! Form::text('email', $contact->email, array('class' => 'form-control', 'placeholder' => 'ex. you@yourdomain.com')) !!}
				</div>
				</div>

				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				{!! Form::label('phone', 'Phone') !!}
				{!! Form::text('phone', $contact->phone, array('class' => 'form-control', 'placeholder' => 'ex. (123) 456-789')) !!}
				</div>
				</div>

				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				{!! Form::label('birthday', 'Birthday') !!}
				{!! Form::text('birthday', $contact->birthday, array('class' => 'form-control', 'placeholder' => 'ex. 07/04/1776')) !!}
				</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8 col-xs-12">
				<div class="form-group">
				{!! Form::label('address', 'Address') !!}
				{!! Form::text('address', $contact->address, array('class' => 'form-control')) !!}
				</div>
				</div>
				<div class="col-md-4 col-xs-12">
				<div class="form-group">
				{!! Form::label('address2', 'Address Line 2') !!}
				{!! Form::text('address2', $contact->address2, array('class' => 'form-control', 'placeholder' => '(optional)')) !!}
				</div>	
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-xs-12">
				<div class="form-group">
				{!! Form::label('city', 'City') !!}
				{!! Form::text('city', $contact->city, array('class' => 'form-control')) !!}
				</div>
				</div>

				<div class="col-md-3 col-xs-12">
				<div class="form-group">
				{!! Form::label('state', 'State') !!}
				{!! Form::text('state', $contact->state, array('class' => 'form-control')) !!}
				</div>
				</div>

				<div class="col-md-3 col-xs-12">
				<div class="form-group">
				{!! Form::label('zip', 'Zip Code') !!}
				{!! Form::text('zip', $contact->zip, array('class' => 'form-control')) !!}
				</div>
				</div>
			</div>

			<div class="row">
			<div class="col-md-2">
			{!! Form::submit('Update Contact', array('class' => 'btn btn-primary')) !!}
			</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection
