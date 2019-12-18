@extends('layouts.masterlayout')
@section('title')
	evento - dashboard
@endsection
@section('content')
	<section class="page-alignment">
		<div>
			<a href="{{ route('event.create') }}" class="btn btn--full">
				Event aanmaken
			</a>
		</div>
	</section>
@endsection