<div class="tab spacing-top-s">
	<div class="tab__heading" id="scrollbar">
		@foreach($sessions as $session)
			<button class="tab__button tab__links {{$loop->iteration === 1 ? 'active' : ''}}" onclick="openTabs(event, {{ $session['id'] }})">
				{{ date('d/m', strtotime( $session['date'])) }}
			</button>
		@endforeach
	</div>
	
	<div id="tab__container">
		@foreach($sessions as $session)
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
					<div class="table__content" id="scrollbar">
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
									<div class="ctn--image item__image">
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
								<div class="item__location row row--center">
									@if($sched['location'])
										@svg('location') {{ $sched['location'] }}
									@endif
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

