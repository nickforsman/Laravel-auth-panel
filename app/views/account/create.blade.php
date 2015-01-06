@extends('layout.main')

@section('content')
	
<div class="row">
<div class="col-xs-6 col-sm-6 col-md-4 center-block">

	{{ Form::open(
		array(
			'route' => 'account-create-post', 
			'class' => 'form-horizontal center-block', 
			'name' => 'form', 
			'novalidate' => '',
			'autocomplete' => 'off'
		 )
	) }}
	
	<legend>Register Form</legend>
	<fieldset>	

	<div class="form-group">
		{{ Form::label('email', 'Email Address', array('class' => 'col-lg-2 control-label')) }}
		
		<div class="col-lg-10">
			{{ Form::email('email', NULL, 
				array(
					'class' => 'form-control',
					'id' => 'registerEmail',
					'placeholder' => 'Email',
					'ng-model' => 'user.email',
					'required' => ''
				)
			)}}
		<span ng-show="form.email.$error.email && form.email.$dirty">Not an email</span>
		<span ng-show="form.email.$error.required && form.email.$dirty">Field is required!</span>
		</div>
		@if($errors->has('email'))
			{{ $errors->first('email') }}
		@endif
	</div>

	<div class="form-group">
		{{ Form::label('username', 'Username', array('class' => 'col-lg-2 control-label')) }}
		
		<div class="col-lg-10">
			{{ Form::text('username', NULL, 
				array(
					'class' => 'form-control', 
					'id' => 'registerUsername',
					'placeholder' => 'Username',
					'ng-model' => 'user.username',
					'required' => ''
				)
			)}}
		<span ng-show="form.username.$dirty && form.username.$error.required">Username is required!</span>
		</div>
		@if($errors->has('username'))
			{{ $errors->first('username') }}
		@endif
	</div>

	<div class="form-group">
		{{ Form::label('password', 'Password', array('class' => 'col-lg-2 control-label')) }}
		
		<div class="col-lg-10">
			{{ Form::password('password', 
				array(
					'class' => 'form-control',
					'id' => 'registerPassword',
					'placeholder' => 'Password',
					'ng-model' => 'user.password',
					'ng-minlength' => '6',
					'required' => ''
				)
			)}}
		<span ng-show="form.password.$dirty && form.password.$error.minlength">Password too short!</span>
		<span ng-show="form.password.$dirty && form.password.$error.required">Field is required!</span>
		</div>
		@if($errors->has('password'))
			{{ $errors->first('password') }}
		@endif
	</div>

	<div class="form-group">
		{{ Form::label('passwordAgain', 'Password Again', array('class' => 'col-lg-2 control-label')) }}
		
		<div class="col-lg-10">
			{{ Form::password('passwordAgain', 
				array(					
					'class' => 'form-control',
					'id' => 'registerPassword_again',
					'placeholder' => 'Retype Password',
					'ng-model' => 'user.passwordAgain',
					'confirm-password' => 'passwordAgain',
					'required' => ''
				)
			)}}
		<span ng-show="form.passwordAgain.$dirty && form.passwordAgain.$error.required">Field is required!</span>
		<span ng-show="form.passwordAgain.$dirty && form.passwordAgain.$error.missMatch">Passwords do not match!</span>
		</div>
		@if($errors->has('passwordAgain'))
			{{ $errors->first('passwordAgain') }}
		@endif
	</div>


	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
		{{ Form::submit('Register', array('class' => 'btn btn-success', 'ng-disabled' => 'form.$invalid')) }}
		<a href="{{ URL::route('account-login') }}" class="btn btn-link">&larr; Sign In</a>
		</div>
	</div>

	</fieldset>
	{{ Form::close() }}

</div>
</div>
@stop