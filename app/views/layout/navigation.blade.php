@if (!Auth::check())
<div class="navbar navbar-default navbar-static-top">
<div class="container">
  <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	</button>
	<a class="navbar-brand">Brand</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
	<ul class="nav navbar-nav">
	  <li><a href="{{ URL::route('home') }}">Home</a></li>
	  <li><a href="#">Link</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
	  <li><a href="{{ URL::route('account-create') }}">Register</a></li>
	  <li><a href="{{ URL::route('account-login') }}">Login</a></li>
	  <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Options<b class="caret"></b></a>
		<ul class="dropdown-menu">
		  <li><a href="#">Action</a></li>
		  <li><a href="#">Another action</a></li>
		  <li><a href="#">Something else here</a></li>
		  <li class="divider"></li>
		  <li><a href="#">Separated link</a></li>
		</ul>
	  </li>
	</ul>
  </div>
</div>
</div>
@endif


@if (Auth::check())
<div class="navbar navbar-default navbar-static-top">
<div class="container">
  <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	</button>
	<a class="navbar-brand">Brand</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
	<ul class="nav navbar-nav">
	  <li><a href="{{ URL::route('home') }}">Home</a></li>
	  <li><a href="#">Link</a></li>
	</ul>
	<form class="navbar-form navbar-left">
		<input type="text" class="form-control col-lg-8" ng-model="keywords" ng-change="search()" placeholder="Search">
	</form>
	<ul class="nav navbar-nav navbar-right">
	  <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Options<b class="caret"></b></a>
		<ul class="dropdown-menu">
		  <li><a href="#">Action</a></li>
		  <li><a href="#">Another action</a></li>
		  <li><a href="#">Something else here</a></li>
		  <li class="divider"></li>
		  <li><a href="#">Separated link</a></li>
		</ul>
	  </li>
	  <li><a href="{{ URL::route('account-logout') }}">Log out</a></li>
	</ul>
  </div>
</div>
</div>
@endif