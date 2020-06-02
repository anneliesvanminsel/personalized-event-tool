@extends('layouts.organisation')
@section('title')
	evento - dashboard
@endsection
@section('content')
	<section class="content">
		<div class="row row--center">
			<h3>
				mijn evenementen
			</h3>
			<a href="{{ route('event.create', ['organisation_id' => $organisation['id']]) }}" class="btn btn--small">
				nieuw event
			</a>
		</div>
		
		<div class="section__nav nav">
			<div class="nav__tabs">
				<button class="nav__item tab__links 1 active" onclick="openTabs(event, 1)">
					Gepubliceerd
				</button>
				<button class="nav__item tab__links 2" onclick="openTabs(event, 2)">
					Concepten
				</button>
				<div class="nav__item expands">
					<div class="nav__search-icon" role="button" id="nav__search-icon">
						zoek
					</div>
					
					<div id="nav__search-input" >
						<form
							action="{{ route('organisation.search.events', ['user_id' => $user->id]) }}"
							method="post"
						>
							@csrf
							<input
								class="nav__search-input form__input"
								name="title"
								id="title"
								type="text"
								placeholder="zoek jouw evenement.."
							>
							<button class="close" id="nav__search-close">
								<span class="hidden">sluiten</span>
							</button>
						</form>
						
					</div>
				</div>
			</div>
		</div>
		
		<div class="tab__content" id="1" style="display: block;">
			@if($events->count() > 0)
				<div class="card--container has-wrap">
					@foreach($events as $event)
						@include('partials.card')
					@endforeach
				</div>
				
				<div>
					{{ $events->links() }}
				</div>
			@else
				<div class="card--container has-wrap">
					Er zijn (nog) geen evenementen gevonden.
				</div>
			@endif
		</div>
		
		
		<div class="tab__content" id="2">
			<div class="card--container has-wrap">
				@foreach($drafts as $event)
					@include('partials.card')
				@endforeach
			</div>
			
			<div>
				{{ $drafts->links() }}
			</div>
		</div>
	</section>
	
	<script>
        ( ()=> {
            const button = document.getElementById('nav__search-icon');
            button.addEventListener('click', () => {
                document.getElementById('nav__search-input').classList.toggle('is-expanded');
            });

            const btn = document.getElementById('nav__search-close');
            btn.addEventListener('click', () => {
                document.getElementById('nav__search-input').classList.toggle('is-expanded');
            });
        })();
	</script>
	<script src="{{ asset('js/openTabs.js') }}"></script>
@endsection