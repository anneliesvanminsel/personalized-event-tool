@extends('layouts.speciallayout')
@section('title')
	evento - {{ $event['title'] }}
@endsection
@section('content')
	<div class="page special" style="background-color: {{ $event['bkgcolor'] }}; color: {{ $event['textcolor'] }}">
		<style>
			.header .nav__link {
				color: {{ $event['textcolor'] }}
			}
			
			.header .logo::before {
				background-color: {{ $event['textcolor'] }};
			}
			
			.btn {
				border: none;
				width: auto;
				background-color: {{ $event['textcolor'] }};
				color: {{ $event['bkgcolor'] }}
			}
			
			.btn:hover {
				border: none;
				background-color: {{ $event['textcolor'] }};
				color: {{ $event['bkgcolor'] }};
			}
			
			.special__svg svg {
				fill: {{ $event['bkgcolor'] }};
			}
			
			.btn:hover svg {
				fill: {{ $event['bkgcolor'] }};
			}
			
			.tab {
				color: #000;
			}
			
			.tab__button.active {
				background-color:{{ $event['bkgcolor'] }};
				color: {{ $event['textcolor'] }};
			}
			
			.table__item:nth-child(odd) {
				background-color: {{ $event['bkgcolor'] }}55; /* laatste twee cijfers zijn opacity*/
			}
		</style>
		
		<section class="page-alignment spacing-top-m">
			<h1 class="center">
				<a href="{{ route('event.special', ['event' => $event['id']] ) }}">
					{{ $event['title'] }}
				</a>
			</h1>
		</section>
		
		<section class="special__content">
			<div class="schedule__content">
				<div class="tab">
					<div class="tab__heading">
						@foreach($event->sessions()->get() as $session)
							<button class="tab__button tab__links {{$loop->iteration === 1 ? 'active' : ''}}" onclick="openTabs(event, {{ $session['id'] }})">
								{{ date('d/m', strtotime( $session['date'])) }}
							</button>
						@endforeach
					</div>
					<div id="tab__container">
						@foreach($event->sessions()->get() as $session)
							<div class="tab__content" id="{{ $session['id'] }}" {{$loop->iteration === 1 ? 'style=display:'.'block' : ''}}>
								@if($session->schedules()->exists())
									<div class="table__heading row row--stretch is-mobile" style="border-color: {{ $event['bkgcolor'] }}">
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
												background-color: {{ $event['textcolor'] }}55; /* laatste twee cijfers zijn opacity*/
											}
										</style>
										
										@foreach($session->schedules()->get() as $sched)
											<div class="table__item row row--stretch is-mobile">
												<div class="">
													{{ \Carbon\Carbon::parse($sched['starttime'])->format('H:i') }}
													@if($sched['endtime'])
														- {{ \Carbon\Carbon::parse($sched['endtime'])->format('H:i')}}
													@endif
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
								@else
									<p>
										Er is nog geen planning toegevoegd.
									</p>
								@endif
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>
	</div>
	<script src="{{ asset('js/openTabs.js') }}" > </script>
@endsection