@extends('layouts.masterlayout')
@section('title')
	evento - maak event
@endsection
@section('content')
	<section class="page-alignment spacing-top-m">
		<h1>
			Evenement instellingen
		</h1>
		<div class="spacing-top-m row row--stretch">
			<a href="#planning" class="btn">Planning</a>
			<a href="#grondplan" class="btn">Grondplan</a>
			<a href="#ticket" class="btn">Ticket</a>
			<a href="#shift" class="btn">Taken & Shiften</a>
		</div>
		
		<h2 class="spacing-top-m" id="planning">
			Planning
		</h2>
		
		@if($event->sessions()->exists())
			<div class="schedule__content">
				<div class="schedule__headcontainer row row--stretch">
					@foreach($event->sessions()->get() as $session)
						<div class="schedule__heading">
							<div>
								{{ $session['name'] }}
							</div>
							
							<div>
								{{  date('d/m', strtotime( $session['date'])) }}
							</div>
						</div>
					@endforeach
				</div>
				@foreach($event->sessions()->get() as $session)
					@if($session->schedules()->exists())
						<div class="table">
							<div class="table__heading row row--stretch" style="border-color: {{ $event['bkgcolor'] }}">
								<div>
									Uur
								</div>
								<div>
									Wat
								</div>
								<div>
									Waar
								</div>
							</div>
							<div class="table__content">
								<style>
									.table__item:nth-child(odd) {
										background-color: {{ $event['bkgcolor'] }}55;
									}
								</style>
								
								<!-- laatste twee cijfers zijn opacity -->
								@foreach($session->schedules()->get() as $sched)
									<div class="table__item row row--stretch">
										<div class="">
											{{ $sched['starttime'] }} - {{ $sched['endtime'] }}
										</div>
										<div class="">
											<div class="">
												{{ $sched['title'] }}
											</div>
											<p class="">
												{{ $sched['description'] }}
											</p>
										</div>
										<div class="">
											{{ $sched['location'] }}
										</div>
									</div>
								@endforeach
							</div>
						</div>
					@else
						@if(Auth::user() && Auth::user()->role === 'organisator')
							<a href="#">
								Voeg een nieuw item aan jouw planning toe.
							</a>
						@endif
					@endif
				@endforeach
			</div>
		@else
			<a href="">Voeg een datum toe</a>
		@endif
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
				<div>
					@foreach($event->floorplans()->get() as $floorplan)
						<div class="row row--stretch">
							@if($floorplan['name'])
								<div>
									{{ $floorplan['name'] }}
								</div>
							@endif
							
							@if(File::exists(public_path() . "/images/" . $floorplan['image']))
								<div class="ctn--image">
									<img src="{{ asset('images/' . $floorplan['image'] ) }}" alt="{{ $floorplan['name'] }}" loading="lazy">
								</div>
							@else
								<div class="ctn--image">
									<img src="https://placekitten.com/600/600" alt="{{ $floorplan['name'] }}" loading="lazy">
								</div>
							@endif
							
							<div class="row">
								<button class="btn is-icon" onclick="openForm('floorplan-edit-form-{{$loop->iteration}}')">
									@svg('edit', 'is-small')
								</button>
								
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
				<div>
					@foreach($event->tickets()->get() as $ticket)
						<div class="row row--stretch">
							<div>
								{{ $ticket['name'] }}
							</div>
							@if($ticket['type'])
								<div>
									{{ $ticket['type'] }}
								</div>
							@endif
							<div>
								€ {{ $ticket['price'] }}
							</div>
							@if($ticket['description'])
								<p>
									{{ $ticket['description'] }}
								</p>
							@endif
							<div class="row">
								<button class="btn is-icon" onclick="openForm('ticket-edit-form-{{$loop->iteration}}')">
									@svg('edit', 'is-small')
								</button>
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
		</section>
	</section>
	<script src="{{ asset('js/popup.js') }}"></script>
@endsection