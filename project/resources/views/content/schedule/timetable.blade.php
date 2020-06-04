<div class="timetable row {{ $event['theme'] }}">
	@foreach($sessions as $session)
		<div class="timetable__column">
			<div class="timetable__heading {{ \Carbon\Carbon::parse($session['date']) === \Carbon\Carbon::now() ? 'today' : '' }}">
				{{ \Jenssegers\Date\Date::parse(strtotime($session['date']))->format('l') }}
				<br>
				{{ \Jenssegers\Date\Date::parse(strtotime($session['date']))->format('d/m/Y') }}
			</div>
			@if($session->schedules()->exists())
				@foreach($session->schedules()->orderBy('starttime', 'asc')->get() as $sched)
					<div class="timetable__item item">
						<div class="item__time">
							{{ \Carbon\Carbon::parse($sched['starttime'])->format('H:i') }}
							@if($sched['endtime'])
								- {{ \Carbon\Carbon::parse($sched['endtime'])->format('H:i')}}
							@endif
						</div>
						<div class="item__content">
							<div class="item__title">
								{{ $sched['title'] }}
							</div>
							<p class="item__description">
								{{ $sched['description'] }}
							</p>
						</div>
						<div class="item__location row row--center">
							@svg('location') The Ginger Studio, Brussel
						</div>
					</div>
				@endforeach
			@endif
		</div>
	@endforeach
</div>
<script src="{{ asset('js/openTabs.js') }}"></script>