<h3 class="schedule__title">
	Planning
</h3>

<div class="tab spacing-top-s">
	<div class="tab__heading">
		@foreach($event->sessions()->get() as $session)
			<button class="tab__button tab__links {{$loop->iteration === 1 ? 'active' : ''}}" onclick="openTabs(event, {{ $session['id'] }})">
				{{ date('d/m', strtotime( $session['date'])) }}
			</button>
		@endforeach
	</div>
	
	<div id="tab__container">
		@foreach($event->sessions()->get() as $session)
			<div class="tab__content table" id="{{ $session['id'] }}" {{$loop->iteration === 1 ? 'style=display:'.'block' : ''}}>
				@if($session->schedules()->exists())
					<div class="table__heading row row--stretch is-mobile" style="border-color: {{ $event['bkgcolor'] }}">
						<div class="item__time">
							Uur
						</div>
						<div class="item__image is-hidden"></div>
						<div class="item__content">
							Wat
						</div>
						<div class="item__location"></div>
					</div>
					<div class="table__content">
						@foreach($session->schedules()->orderBy('starttime', 'asc')->get() as $sched)
							<div class="item row">
								<div class="item__time">
									{{ \Carbon\Carbon::parse($sched['starttime'])->format('H:i') }}
									@if($sched['endtime'])
										<br>
										- <br>
										{{ \Carbon\Carbon::parse($sched['endtime'])->format('H:i')}}
									@endif
								</div>
								
								@if($sched['image'] && File::exists(public_path() . "/images/" . $sched['image']))
									<div class="item__image">
										<img src="{{ asset('images/' . $sched['image'] ) }}" alt="{{ $sched['title'] }}" loading="lazy">
									</div>
								@else
									<div class="item__image is-hidden"></div>
								@endif
								
								<div class="item__content">
									<h4 class="item__title">
										{{ $sched['title'] }}
									</h4>
									<p class="item__description">
										{{ $sched['description'] }}
									</p>
								</div>
								
								<div class="item__location row">
									@svg('location') {{ $sched['location'] }}
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