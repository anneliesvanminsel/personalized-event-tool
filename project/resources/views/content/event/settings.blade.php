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
			<a href="#medewerkers" class="btn">Mederwerkers</a>
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
			<h2>
				Grondplan
			</h2>
			<button class="btn" onclick="openForm('floorplan-form')">
				Voeg ticket toe
			</button>
			<div class="popup" id="floorplan-form">
				@include('content.floorplan.create')
			</div>
		</section>
		
		<section  class="spacing-top-m" id="ticket">
			<h2>
				Tickets
			</h2>
			<button class="btn" onclick="openForm('ticket-form')">
				Voeg ticket toe
			</button>
			<div class="popup" id="ticket-form">
				@include('content.ticket.create')
			</div>
		</section>
		
		
	
			
		<h2 class="spacing-top-m" id="medewerkers">
			Medewerkers
		</h2>
		
		<h2 class="spacing-top-m" id="shift">
			Taken & Shiften
		</h2>
	</section>
@endsection