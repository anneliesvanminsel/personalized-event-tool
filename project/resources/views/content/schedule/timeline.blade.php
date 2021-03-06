<style>
	.timeline:after {
		 background-color: {{ $event['prim_color'] }};
	}
	
	.timeline .item:after {
		 border: 1px solid {{ $event['prim_color'] }};
	}
	
	.timeline .item__title {
		color: {{ $event['prim_color'] }};
	}
</style>

<div class="tab spacing-top-s">
	<div class="tab__heading {{ (strpos(Route::currentRouteName(), 'event.settings.schedule') === 0) ? '' : $event['theme'] }}">
		@foreach($sessions as $session)
			<button class="tab__button tab__links {{$loop->iteration === 1 ? 'active' : ''}}" onclick="openTabs(event, {{ $session['id'] }})">
				{{ date('d/m', strtotime( $session['date'])) }}
			</button>
		@endforeach
	</div>
	
	<div id="tab__container">
		@foreach($sessions as $session)
			<div class="tab__content {{ (strpos(Route::currentRouteName(), 'event.settings.schedule') === 0) ? '' : $event['theme'] }}" id="{{ $session['id'] }}" {{$loop->iteration === 1 ? 'style=display:'.'block' : ''}}>
				@if($session->schedules()->exists())
					<div class="timeline {{ (strpos(Route::currentRouteName(), 'event.settings.schedule') === 0) ? '' : $event['theme'] }}" id="scrollbar">
						@foreach($session->schedules()->orderBy('starttime', 'asc')->get() as $sched)
							<div class="item">
								<div class="item__content">
									<div class="item__time">
										{{ \Carbon\Carbon::parse($sched['starttime'])->format('H:i') }}
										-
										{{ \Carbon\Carbon::parse($sched['endtime'])->format('H:i') }}
									</div>
									<div class="item__information">
										<h4 class="item__title">
											{{ $sched['title'] }}
										</h4>
										@if($sched['description'])
											<p class="item__description">
												{{ $sched['description'] }}
											</p>
										@endif
										<div class="item__location row">
											@svg('location')
											{{ $sched['location'] }}
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				@else
					<p class="timeline__content">
						Er is nog geen planning toegevoegd.
					</p>
				@endif
			</div>
		@endforeach
	</div>
</div>
<script src="{{ asset('js/openTabs.js') }}"></script>