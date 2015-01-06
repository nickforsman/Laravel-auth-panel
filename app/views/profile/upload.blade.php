@extends('layout.main')

@section('content')

<div class="row">
<div class="col-xs-6 col-sm-6 col-md-4 center-block">

	{{ Form::open(
		array(
			'route' => 'user-upload-post', 
			'class' => 'form-horizontal center-block', 
			'name' => 'form-upload', 
			'enctype' => 'multipart/form-data',
			'method' => 'post',
			'files' => true,
			'novalidate' => ''
		)
	) }}

	<legend>Upload Form</legend>
	<fieldset>

	<div class="form-group">
		{{ Form::label('images', 'Images', array('class' => 'col-lg-2 control-label')) }}
		
		<div class="col-lg-10">
			<div class="checkbox">
			{{ Form::file('files[]', array('multiple' => '', 'required' => '')) }}
			</div>
		<p class="help-block">Only image files are allowed (png, jpg, gif, etc)</p>
		@if($errors->has('files'))
			<p class="text-danger">{{ $errors->first('files') }}</p>
		@endif
		</div>
	</div>

	<div class="progress progress-striped active">
		<div class="progress-bar" style="width: 10%;"></div>
	</div>

	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
		{{ Form::submit('Upload', array('class' => 'btn btn-primary btn-sm')) }}
		</div>
	</div>

	</fieldset>	
	{{ Form::close() }}

</div>
</div>

@stop