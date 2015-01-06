<!DOCTYPE html>
<html lang="en" ng-app="app">
	<head>
		<meta charset="utf-8">
		<title>Admin panel</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">


		<!-- build:css(.tmp) styles/main.css -->
		{{ HTML::style('css/vendor.css') }}
		{{ HTML::style('css/main.css') }}
		<!-- endbuild -->

	</head>
<body>

	<!--[if lt IE 10]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. 
		Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	@include('layout.navigation')
	@if (Session::has('global'))
	<div class="row">
		<div class="col-lg-8">
			<div class="alert alert-dismissable alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Well done!</strong><p>{{ Session::get('global') }}</p>
			</div>
		</div>
	</div>
	@endif
	@yield('content')

</body>

	<!-- [javascript vendor/assests] !-->
	{{ HTML::script('js/angular.js') }}
	{{ HTML::script('js/vendor.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}

	<!-- [javascript main/essentials] -->
	{{ HTML::script('js/app.js') }}
	{{ HTML::script('js/directives/confirmPassword.js') }}
	{{ HTML::script('js/main.js') }}


	<!-- [javascript plugin/assest] -->
	{{ HTML::script('js/plugins.js') }}

</html>