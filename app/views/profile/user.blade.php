@extends('layout.main')

@section('content')	
<div class="row">
	<div class="container">
	<div class="col-xs-12 col-md-8">
		<h2>{{ $user->username }}</h2>
		<dl class="dl-horizontal">
			<dt>Description</dt>
			<dd class="text-muted">Hard working asshole; likes pancakes!</dd>
			<dt>Euismod</dt>
			<dd class="text-muted">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
Donec id elit non mi porta gravida at eget metus</dd>
			<dt>Felis euismod semper</dt>
			<dd class="text-muted">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
			<address>
			<dt>Address</dt>
				<dd><strong>Twitter, Inc.</strong></dd>
				<dd>795 Folsom Ave, Suite 600</dd>
				<dd>San Francisco, CA 94107</dd>
				<dd><abbr title="Phone">P:</abbr> (123) 456-7890</dd>
			</address>
			<address>
				<dt><strong>Contact</strong></dt>
				<dd><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></dd>
			</address>
		</dl>
	</div>
	</div>
</div>
@stop