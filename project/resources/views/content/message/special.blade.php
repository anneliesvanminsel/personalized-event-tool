@extends('layouts.speciallayout')
@section('title')
	{{ $event['title'] }} - berichten
@endsection
@section('content')
	<div class="special section {{ $event['theme'] }}">
		<section class="special__content">
			@if($event->messages()->exists())
				
				@foreach($event->messages()->get() as $msg)
					<div class="message {{ $msg->type }}">
						@if($msg->image)
							<div class="message__image ctn--image">
								<img src="{{ asset('images/' . $msg['image'] ) }}" alt="{{ $msg['title'] }}" loading="lazy">
							</div>
						@endif
						<div class="message__content">
							@if($msg->title)
								<h3 class="message__title">
									{{ $msg->title }}
								</h3>
							@endif
							<div class="message__text">
								{{ $msg->message }}
							</div>
						</div>
					</div>
				@endforeach
				
			@else
				<div>
					Er zijn nog geen berichten toegevoegd.
				</div>
			@endif
			
		</section>
	</div>
	<script src="{{ asset('js/openTabs.js') }}" > </script>

@endsection