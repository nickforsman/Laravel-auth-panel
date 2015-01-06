@extends('layout.main')

@section('content')
<div class="row">
<div class="col-xs-6 col-sm-6 col-md-4 center-block">
<h1><b>Hello </b><i>again</i> {{ Auth::user()->username }}</h1>

	@if(!empty($files))
	<table class="table table-bordered">
		<thead>
			<tr>
				<th># Number</th>
				<th>Filename</th>
				<th>Filesize</th>
				<th>Filetype</th>
				<th>Download</th>
			</tr>
			<tbody>
			@foreach($files as $key => $file)
				<tr>
					<th scope="row">{{ $key + 1 }}</th>
					<td>{{ $file }}</td>
					@if(filesize($file) >= 1024)
					<td>{{ number_format(filesize($file) / 1024) }} Kb</td>
					@else
					<td>{{ filesize($file) }} B</td>
					@endif
					<td>{{ filetype($file) }}</td>
					<td><a href="{{ URL::to("/$file") }}" download class="btn btn-link btn-xs">Download</a></td>
				</tr>
			@endforeach
			</tbody>
		</thead>
	</table>
	@else
		<div class="alert alert-dismissable alert-warning">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<h4>Warning!</h4>
		<p>Note. There were no files located in the uploads folder. Have you <a href="{{ URL::route('user-upload', Auth::user()->username) }}" class="alert-link">uploaded</a> a file yet?</p>
		</div>
	@endif
</div>
</div>
@stop