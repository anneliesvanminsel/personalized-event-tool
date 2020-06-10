@extends('layouts.speciallayout')
@section('title')
	{{ $event['title'] }} - berichten
@endsection
@section('content')
	<div class="special section {{ $event['theme'] }}">
		@if($event->messages()->exists())
			<section class="section message--container">
				<div id="tab__container table">
					@foreach($event->messages()->get() as $msg)
						<div class="message {{$msg['type']}} {{ $event['theme'] }}">
							@if($msg['image'])
								<div class="message__image">
									<img src="{{ asset('images/' . $msg['image']) }}" alt="logo voor {{ $msg->title }}">
								</div>
							@else
								<div class="message__image is-hidden"></div>
							@endif
							
							<div class="message__content">
								<h4 class="message__title">
									{{ $msg['title'] }}
								</h4>
								<div class="message__text">
									{{ $msg['message'] }}
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</section>
		@else
			<div>
				Er zijn nog geen berichten toegevoegd.
			</div>
		@endif
		
	</div>
	<script src="{{ asset('js/openTabs.js') }}" > </script>

@endsection