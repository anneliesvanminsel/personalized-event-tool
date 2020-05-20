@extends('layouts.organisation')
@section('title')
	evento - maak event
@endsection
@section('content')
	<section class="section content">
		<h2>
			{{ $event['title'] }}
		</h2>
		
		<div class="section__nav nav">
			<div class="nav__tabs">
				<a class="nav__item" href="{{ route('event.settings.schedule', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Planning
				</a>
				<a class="nav__item" href="{{ route('event.settings.floorplan', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Grondplan
				</a>
				<a class="nav__item" href="{{ route('event.settings.ticket', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Ticket
				</a>
				<a class="nav__item active" href="{{ route('event.settings.message', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Berichten
				</a>
			</div>
		</div>
		
		<div id="tab__container">
			<div class="row row--center">
				<div class="is-grow" style="position: relative;">
					<div class="nav__item expands">
						<div class="nav__search-icon" role="button" id="nav__search-icon">
							@svg('search')
						</div>
						
						<div id="nav__search-input" style="display: none;">
							<input class="nav__search-input form__input" type="text" placeholder="zoek jouw evenement.." autofocus>
							<button class="close" id="nav__search-close">
								<span class="hidden">sluiten</span>
							</button>
						</div>
					</div>
				</div>
				<a class="btn is-small" href="{{ route('message.create', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Voeg een item toe
				</a>
			</div>
			
			@if($event->messages()->exists())
				<section class="section schedule">
					<div id="tab__container table">
						@foreach($event->messages()->get() as $msg)
							<div class="message row">
								@if($msg['image'] && File::exists(public_path() . "/images/" . $msg['image']))
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
									<p class="message__text is-type">
										{{ $msg['type'] }}
									</p>
									<div class="message__text">
										{{ $msg['message'] }}
									</div>
								</div>
								
								<div class="message__actions">
									<a href="{{ route('message.update', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'], 'message_id' => $msg['id'] ]) }}" class="">
										@svg('edit', 'is-btn')
									</a>
									<form
										class="form"
										onsubmit="return confirm('Ben je zeker dat je dit bericht wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
										method="POST"
										action="{{ route('message.delete', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'], 'message_id' => $msg['id'] ]) }}"
									>
										{{ csrf_field() }}
										<button class="button is-icon" type="submit">
											@svg('delete', 'is-btn')
										</button>
									</form>
								</div>
							</div>
						@endforeach
					</div>
				</section>
			@endif
		</div>
	</section>
@endsection