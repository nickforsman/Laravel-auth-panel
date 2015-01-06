@extends('layout.main')

@section('content')
<div class="row">
<div class="col-xs-6 col-sm-6 col-md-4 center-block">
	{{ Form::open(
		array(
			'route' => 'account-login-post',
			'class' => 'form-horizontal center-block',
			'name' => 'loginForm',
			'novalidate' => ''
		)
	) }}
	<legend>Login Form</legend>
	<fieldset>		

	<div class="form-group">
		{{ Form::label('username', 'Username', array('class' => 'col-lg-2 control-label')) }}

		<div class="col-lg-10">
		{{ Form::text('username', NULL, 
			array(
				'class' => 'form-control',
				'placeholder' => 'Username *',
				'ng-model' => 'user.Username',
				'required' => ''
			)
		)}}
		<span ng-show="loginForm.username.$dirty && loginForm.username.$error.required">Field is required!</span>
		@if($errors->has('username'))
			{{ $errors->first('username') }}
		@endif
		</div>
	</div>
		
	<div class="form-group">
		{{ Form::label('password', 'Password', array('class' => 'col-lg-2 control-label')) }}

		<div class="col-lg-10">
		{{ Form::password('password', 
			array(
				'class' => 'form-control',
				'placeholder' => 'Password *',
				'ng-model' => 'user.Password',
				'required' => ''
			)
		)}}
		<span ng-show="loginForm.password.$dirty && loginForm.password.$error.required">Field is required!</span>
		@if($errors->has('password'))
			{{ $errors->first('password') }}
		@endif
			<div class="checkbox">
				<label for="remember" class="check">
				{{ Form::checkbox('remember', 'remember', '', array('id' => 'remember'))}} <span class="me">Remember Me</span>
				</label>
			</div>
		</div>
	</div>

	<div class="form-group">
		
	</div>

	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
		{{ Form::submit('Login', array('class' => 'btn btn-success')) }}
		<a href="{{ URL::route('account-create') }}" class="btn btn-info">Register</a>
		<a href="#0" class="btn btn-link">Forgot Password?</a>
		</div>
	</div>

	</fieldset>
	{{ Form::close() }}
</div>
</div>
@stop