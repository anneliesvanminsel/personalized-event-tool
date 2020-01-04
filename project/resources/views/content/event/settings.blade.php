@extends('layouts.masterlayout')
@section('title')
	evento - maak event
@endsection
@section('content')
	<div class="page-alignment spacing-top-m">
		<h1>
			{{ $event['title'] }} - Instellingen bewerken
		</h1>
		<div class="spacing-top-m row row--stretch">
			<a href="#planning" class="btn">Planning</a>
			<a href="#grondplan" class="btn">Grondplan</a>
			<a href="#ticket" class="btn">Ticket</a>
			<a href="#shift" class="btn">Taken & Shiften</a>
		</div>
		
		<section class="spacing-top-m" id="planning">
			<div class="row row--stretch">
				<h2>
					Planning
				</h2>
				<button class="btn btn--small" onclick="openForm('schedule-create-form')">
					Voeg een item toe
				</button>
			</div>
			
			@if($event->sessions()->exists())
				<div class="row-grid">
					@foreach($event->sessions()->get() as $session)
						<div class="row-grid__item item row row--stretch">
							<div>
								{{  date('d/m', strtotime( $session['date'])) }}
							</div>
						</div>
						@foreach($session->schedules()->get() as $schedule)
							<div>
								{{ $schedule['title'] }}
							</div>
						@endforeach
					@endforeach
				</div>
				<div class="popup" id="schedule-create-form">
					@include('content.schedule.create')
				</div>
			@endif
		</section>
		
		<section  class="spacing-top-m" id="grondplan">
			<div class="row">
				<h2>
					Grondplan
				</h2>
				<button class="btn btn--small" onclick="openForm('floorplan-form')">
					Voeg grondplan toe
				</button>
			</div>
			@if($event->floorplans()->exists())
				<div class="row-grid">
					@foreach($event->floorplans()->get() as $floorplan)
						<div class="row-grid__item item row row--stretch">
							@if($floorplan['name'])
								<div class="item__title">
									{{ $floorplan['name'] }}
								</div>
							@endif
							
							@if(File::exists(public_path() . "/images/" . $floorplan['image']))
								<div class="item__image ctn--image">
									<img src="{{ asset('images/' . $floorplan['image'] ) }}" alt="{{ $floorplan['name'] }}" loading="lazy">
								</div>
							@else
								<div class="item__image ctn--image">
									<img src="https://placekitten.com/600/600" alt="{{ $floorplan['name'] }}" loading="lazy">
								</div>
							@endif
							
							<div class="row">
								<button class="btn is-icon" onclick="openForm('floorplan-edit-form-{{$loop->iteration}}')">
									@svg('edit', 'is-small')
								</button>
								<form
										class="form"
										onsubmit="return confirm('Ben je zeker dat je {{ $floorplan['name'] }} wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
										method="POST"
										action="{{ route('floorplan.delete', ['event_id' => $event['id'], 'floorplan_id' => $floorplan['id'] ]) }}"
								>
									{{ csrf_field() }}
									<button class="btn is-icon" type="submit">
										@svg('delete', 'is-small')
									</button>
								</form>
							</div>
						</div>
						<div class="popup" id="floorplan-edit-form-{{$loop->iteration}}">
							@include('content.floorplan.edit', ['current_floorplan' => $floorplan])
						</div>
					@endforeach
				</div>
			@endif
			<div class="popup" id="floorplan-form">
				@include('content.floorplan.create')
			</div>
		</section>
		
		<section  class="spacing-top-m" id="ticket">
			<div class="row">
				<h2>
					Tickets
				</h2>
				<button class="btn btn--small" onclick="openForm('ticket-form')">
					Voeg ticket toe
				</button>
			</div>
			@if($event->tickets()->exists())
				<div class="row-grid">
					@foreach($event->tickets()->get() as $ticket)
						<div class="row-grid__item item row row--stretch">
							@if($ticket['name'])
								<div class="item__text has-grow is-title">
									{{ $ticket['name'] }}
								</div>
							@endif
							@if($ticket['type'])
								<div class="item__text">
									{{ $ticket['type'] }}
								</div>
							@endif
							<div class="item__text is-title">
								€ {{ $ticket['price'] }}
							</div>
							@if($ticket['description'])
								<p class="item__text has-grow">
									{{ $ticket['description'] }}
								</p>
							@endif
							<div class="row">
								<button class="btn is-icon" onclick="openForm('ticket-edit-form-{{$loop->iteration}}')">
									@svg('edit', 'is-small')
								</button>
								<form
										class="form"
										onsubmit="return confirm('Ben je zeker dat je {{ $ticket['name'] }} wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
										method="POST"
										action="{{ route('ticket.delete', ['event_id' => $event['id'], 'ticket_id' => $ticket['id'] ]) }}"
								>
									{{ csrf_field() }}
									<button class="btn is-icon" type="submit">
										@svg('delete', 'is-small')
									</button>
								</form>
							</div>
							<div class="popup" id="ticket-edit-form-{{$loop->iteration}}">
								@include('content.ticket.edit', ['current_ticket' => $ticket])
							</div>
						</div>
					@endforeach
				</div>
			@endif
			
			<div class="popup" id="ticket-form">
				@include('content.ticket.create')
			</div>
		</section>
		
		<section  class="spacing-top-m" id="shift">
			<div class="row">
				<h2>
					Taken & Shiften
				</h2>
				<button class="btn btn--small" onclick="openForm('task-form')">
					Voeg taak toe
				</button>
			</div>
			@if($event->sessions()->exists())
				<div class="row-grid">
					@foreach($event->sessions()->get() as $session)
						<div class="row-grid__item item is-small row row--stretch">
							<div class="item__title">
								{{  date('d/m', strtotime( $session['date'])) }}
							</div>
						</div>
					@endforeach
				</div>
			@endif
			
			<div class="popup" id="task-form">
				@include('content.task.create')
			</div>
		</section>
	</div>
	<script src="{{ asset('js/popup.js') }}"></script>
@endsection