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
		</style>
		
		<section class="page-alignment spacing-top-m">
			<h1 class="center">
				{{ $event['title'] }}
			</h1>
		</section>
		
		<section class="special__content">
			<div class="schedule__content">
				<div class="schedule__headcontainer">
					@foreach($event->sessions()->get() as $session)
						<div class="schedule__heading">
							<div>
								{{  date('d/m', strtotime( $session['date'])) }}
							</div>
						</div>
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
											background-color: {{ $event['bkgcolor'] }}55; /* laatste twee cijfers zijn opacity*/
										}
									</style>
									
									@foreach($session->schedules()->get() as $sched)
										<div class="table__item row row--stretch">
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
							</div>
						@else
							<p>
								Er is nog geen planning toegevoegd.
							</p>
						@endif
					@endforeach
				</div>
			</div>
		</section>
	</div>
@endsection