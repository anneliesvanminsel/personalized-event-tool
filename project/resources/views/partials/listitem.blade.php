<div class="list__item item row row--stretch row--reverse">
	<div class="item__image ctn--image">
		<a href={{ route('event.detail', ['event_id' => $event->id]) }}>
			@if(File::exists(public_path() . "/images/" . $event['image']))
				<img src="{{ asset('images/' . $event['image'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
			@else
				<img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
			@endif
		</a>
	</div>
	
	<div class="item__content">
		<div class="item__section row row--stretch">
			<h4 class="item__title">
				<a href={{ route('event.detail', ['event_id' => $event->id]) }}>
					{{ $event->title }}
				</a>
			</h4>
			
			<div class="item__actions row">
				@if(Auth::user() && $event->organisation_id === Auth::user()->organisation_id)
					@php
						$organisation = $event->organisation;
					@endphp
					<div class="item__actions row row--stretch">
						<form
							class="form"
							onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} wilt {{ $event['published'] === 0 ? 'zichtbaar maken' : 'onzichtbaar maken' }}?');"
							method="POST"
							action="{{ route('event.publish', ['organisation_id' => $organisation['id'], 'event-id' => $event['id'] ]) }}"
						>
							{{ csrf_field() }}
							
							<button title="set visiblility" class="button is-icon" type="submit">
								@if($event['published'] === 0)
									@svg('hide', 'is-btn')
								@else
									@svg('view', 'is-btn')
								@endif
							</button>
						</form>
						<a title="edit event information" class="button is-icon" href={{route('event.update', ['organisation_id' => $organisation['id'], 'event_id' => $event->id])}}>
							@svg('edit', 'is-btn')
						</a>
						<a title="edit event settings" class="button is-icon" href={{route('event.edit.settings', ['organisation_id' => $organisation['id'],'event_id' => $event->id])}}>
							@svg('tools', 'is-btn')
						</a>
						<form
							class="form"
							onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} voor alle organisatoren wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
							method="POST"
							action="{{ route('event.delete', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'] ]) }}"
						>
							{{ csrf_field() }}
							<button class="button is-icon" type="submit">
								@svg('delete', 'is-btn')
							</button>
						</form>
					</div>
				@else
					@if(Auth::user())
						<button title="like" class="button is-icon" onclick="postAjax('/user/event/{{$event->id}}/like', null, this)">
					@else
						<a title="like" class="button is-icon" href="{{ route('login') }}">
					@endif
						@if(Auth::user() && $event->favusers->contains(Auth::user()->id))
							@svg('heart-full', 'is-btn is-heart full')
						@else
							@svg('heart-full', 'is-btn is-heart empty')
						@endif
					@if(Auth::user())
						</button>
					@else
						</a>
					@endif
				@endif
			</div>
		</div>
		
		<div class="item__section row with-data">
			<div class="row needs-space">
				@svg('clock')
				{{ \Jenssegers\Date\Date::parse(strtotime($event['starttime']))->format('H:i') }}
			</div>
			@if($event->address()->exists())
				<div class="row">
					@svg('location')
					{{ $event->address()->first()->locationname }}{{ $event->address()->first()->locationname ? ',' : '' }} {{ $event->address()->first()->city }}
				</div>
			@endif
		</div>
		<div class="item__text item__section">
			<a href={{ route('event.detail', ['event_id' => $event->id]) }}>
				{{ $event->description }}
			</a>
		</div>
	</div>
	
	<div class="item__date">
		<a href={{ route('event.detail', ['event_id' => $event->id]) }}>
			<div class="date-field">
				<div>
					@if($event['enddate'])
						{{ \Jenssegers\Date\Date::parse(strtotime($event['startdate']))->format('j') }} -
						{{ \Jenssegers\Date\Date::parse(strtotime($event['enddate']))->format('j') }}
					@else
						{{ \Jenssegers\Date\Date::parse(strtotime($event['startdate']))->format('j') }}
					@endif
				</div>
			</div>
			<div class="date-month">
				{{ \Jenssegers\Date\Date::parse(strtotime($event['startdate']))->format('M') }}
			</div>
		</a>
	</div>
</div>