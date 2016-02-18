@extends('layouts.master')

@section('title', 'List Contacts')

@section('head')
	<script src="{{ URL::asset('js/listContacts.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row" ng-app="app" ng-init="contacts={{$contacts}}">
	<div class="col-md-12 col-xs-12" ng-controller="listContactsCtrl">
		<table class="table">
			<thead>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Birthday</th>
				<th>Address</th>
				<th>Address2</th>
				<th>City</th>
				<th>State</th>
				<th>Zip</th>
				<th><em>Edit</em></th>
				<th><em>Delete</em></th>
			</thead>
			<tbody>
				<tr ng-repeat="c in contacts">
					<td>@{{c.fname}}</td>
					<td>@{{c.lname}}</td>
					<td>@{{c.email}}</td>
					<td>@{{c.phone}}</td>
					<td>@{{c.birthday}}</td>
					<td>@{{c.address}}</td>
					<td>@{{c.address2}}</td>
					<td>@{{c.city}}</td>
					<td>@{{c.state}}</td>
					<td>@{{c.zip}}</td>
					<td><a href="@{{'contact/'+c._id+'/edit'}}" title="@{{'Edit '+c.fname}}" class="btn btn-warning">Edit</a></td>
					<td><a href="#" title="@{{'Edit '+c.fname}}" class="btn btn-danger" ng-click="deleteContact()">Delete</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
