@extends('layouts.master')

@section('title', 'List Contacts')

@section('head')
	<script src="{{ URL::asset('js/listContacts.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="row" ng-app="app" ng-init="contacts={{$contacts}};">
	<div class="col-md-12 col-xs-12" ng-controller="listContactsCtrl">
		<input type="text" ng-model="query" class="form-control" placeholder="search..." />
		<table class="table">
			<thead>
				<th ng-click="setSort('fname')">First Name</th>
				<th ng-click="setSort('lname')">Last Name</th>
				<th ng-click="setSort('email')">Email</th>
				<th ng-click="setSort('phone')">Phone</th>
				<th ng-click="setSort('birthday')">Birthday</th>
				<th ng-click="setSort('address')">Address</th>
				<th ng-click="setSort('address2')">Address2</th>
				<th ng-click="setSort('city')">City</th>
				<th ng-click="setSort('state')">State</th>
				<th ng-click="setSort('zip')">Zip</th>
				<th><em>View</em></th>
				<th><em>Edit</em></th>
				<th><em>Delete</em></th>
			</thead>
			<tbody>
				<tr ng-repeat="c in queryList | orderBy : currSort : currDirection">
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
					<td><a href="@{{'contact/'+c._id}}" title="@{{'View '+c.fname}}" class="btn btn-success">View</a></td>
					<td><a href="@{{'contact/'+c._id+'/edit'}}" title="@{{'Edit '+c.fname}}" class="btn btn-warning">Edit</a></td>
					<td><a href="#" title="@{{'Edit '+c.fname}}" class="btn btn-danger" ng-click="deleteContact($index)">Delete</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
