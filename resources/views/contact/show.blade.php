@extends('layouts.master')

@section('title', 'Profile')

@section('content')

	<div class="row">
		<div class="col-md-12 col-xs-12">
			<h1>{{ $contact->fname . ' ' . $contact->lname }}</h1>
		</div>

		<div class="col-md-12 col-xs-12">
			<a href="mailto:{{$contact->email}}" title="{{$contact->fname.'\'s Email'}}"><em>{{$contact->email}}</em></a>
		</div>
		
		<div class="col-md-12 col-xs-12">
			<strong>{{$contact->phone}}</strong>
		</div>

		@if ( !empty($contact->address) )
		<div class="col-md-12 col-xs-12" style="margin-top: 20px;">
			<address>
				<strong>My Address</strong><br>
				@if ( empty($contact->address2) )
					{{$contact->address}}
				@else
					{{$contact->address . ', ' . $contact->address2}}<br>
				@endif
				
				{{$contact->city . ', ' . $contact->state . ' ' . $contact->zip}}<br>
			</address>
		</div>
		@endif

		<div class="col-md-12 col-xs-12">
			{!! link_to('contact/'.$contact->_id.'/edit', 'Edit Me', ['class' => 'btn btn-warning']) !!}
			{!! Form::open(['route' => ['contact.destroy', $contact->_id], 'method' => 'delete']) !!}
				{!! Form::submit('Delete Me', ['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}
		</div>
	</div>

@endsection
