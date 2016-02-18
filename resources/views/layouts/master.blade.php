<!doctype html>
<html>
<head>
	<title>Address Book - @yield('title')</title>
	
	<script src="{{ URL::asset('bower_components/angular/angular.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('bower_components/jquery/dist/jquery.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.js') }}" type="text/javascript"></script>

	<link href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet" />
	@yield('head')
</head>
<body>
	<div class="container">

		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="/contact">HAProgCha</a>
				</div>

				<ul id="mainNav" class="nav navbar-nav">
					<li><a href="/contact">List Contacts</a></li>
					<li><a href="/contact/create">Add Contact</a></li>
				</ul>
			</div>
		</nav>

		@yield('content')
	</div>
	@yield('foot')
</body>
</html>
