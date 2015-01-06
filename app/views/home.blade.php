@extends('layout.main')

@section('content')
	@if(Auth::check())
	<div class="row">
	<div class="container">
		<div class="col-xs-12 col-md-6">
			<h1>Hello <a href="{{ URL::route('profile-user', Auth::user()->username) }}"> {{ Auth::user()->username }} </a></h1>
			<p class="text-muted">What would you like to do?</p>
			<div class="btn-group btn-group-justified">
				<a href="{{ URL::route('user-upload', Auth::user()->username) }}" class="btn btn-default btn-lg btn-block">Upload</a>
				<a href="{{ URL::route('user-download', Auth::user()->username) }}" class="btn btn-default btn-lg btn-block">Download</a>
				<a href="#" class="btn btn-default btn-lg btn-block">List</a>
			</div>
		</div>
	</div>
	</div>
	@else
	<div class="row">
	<div class="container">
		<div class="col-xs-12 col-md-6">
			<h1>Hello World</h1>
			<p>Nullam quis risus eget <a href="#">urna mollis ornare</a> vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
			<p><small>This line of text is meant to be treated as fine print.</small></p>
			<p>The following snippet of text is <strong>rendered as bold text</strong>.</p>
			<p>The following snippet of text is <em>rendered as italicized text</em>.</p>
			<p>An abbreviation of the word attribute is <abbr title="attribute">attr</abbr>.</p>
			<br>
			<blockquote>
			  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
			  <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
			</blockquote>
		</div>
		<div class="col-xs-12 col-md-6">
			{{ HTML::image('img/logo.png', 'The Logo') }}
		</div>
	</div>
	</div>
	@endif
@stop