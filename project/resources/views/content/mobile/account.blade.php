@extends('layouts.masterlayout')
@section('title')
	evento
@endsection
@section('content')
	<section class="page-alignment spacing-top-s">
		<h2>
			{{ Auth::user()->name }}
		</h2>
		
		<div>
			<p>
				{{ Auth::user()->name }}
			</p>
			<p>
				{{ Auth::user()->email }}
			</p>
			@if(Auth::user()->birthday)
				<p>
					{{  date('d/m/y', strtotime( Auth::user()->birthday ) ) }}
				</p>
			@endif
		</div>
		<div class="spacing-top-l">
			<a class="row is-mobile"
			   href="{{ route('logout') }}"
			   onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"
			>
				@svg('logout')
				<div>
					afmelden
				</div>
			</a>
			
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		</div>
	</section>
@endsection