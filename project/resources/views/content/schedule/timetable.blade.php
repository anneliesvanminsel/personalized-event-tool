<div class="timetable">
	<div class="row">
		@foreach($event->sessions()->get() as $session)
			<div class="timetable__column">
				<div class="timetable__heading">
					{{ \Jenssegers\Date\Date::parse(strtotime($session['date']))->format('l') }} {{ \Jenssegers\Date\Date::parse(strtotime($session['date']))->format('d/m') }}
				</div>
				@if($session->schedules()->exists())
					@foreach($session->schedules()->get() as $sched)
						<div class="timetable__item">
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
				@endif
			</div>
		@endforeach
	</div>
</div>
<script src="{{ asset('js/openTabs.js') }}"></script>