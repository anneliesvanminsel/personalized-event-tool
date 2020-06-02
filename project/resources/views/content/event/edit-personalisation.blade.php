@extends('layouts.organisation')
@section('title')
	evento - maak event
@endsection
@section('content')
	<section class="content">
		<h2>
			evenement aanmaken
		</h2>
		
		<div class="section__nav nav">
			<div class="nav__tabs">
				<p class="nav__item tab__links">
					evenement gegevens
				</p>
				<p class="nav__item tab__links active">
					personalisatiegegevens
				</p>
				<p class="nav__item tab__links">
					adresgegevens
				</p>
			</div>
		</div>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('event.postupdate-personalisation', ['organisation_id' => $organisation->id, 'event_id' => $event->id]) }}"
			class="form"
			enctype="multipart/form-data"
		>
			@csrf
			
			@if($organisation->subscription_id === 3)
				<div class="fieldset">
					<label for="theme" class="form__label">
						thema/theme
					</label>
					
					<div class="checkbox__wrapper">
						<div>
							<div class="row row--center">
								<input type="radio" id="light" name="theme" value="light" {{ $event->theme == 'light' ? 'checked' : ''   }}>
								<label for="light">light / licht</label>
							</div>
							<img src="" alt="">
						</div>
						
						
					</div>
					
					<div class="checkbox__wrapper">
						<div class="row row--center">
							<input type="radio" id="dark" name="theme" value="dark"  {{ $event->theme === 'dark' ? 'checked' : ''   }}>
							<label for="dark">dark / donker</label>
						</div>
					</div>
				</div>
			@endif
			
			<div class="form__group">
				<input
					id="prim-color"
					type="color"
					class="form__input @error('prim-color') is-invalid @enderror"
					name="prim-color"
					placeholder="bv. #effeff"
					value="{{ $event->prim_color   }}"
					required
					autofocus
					autocomplete="off"
					onchange="changeColor('prim-color')"
				>
				
				<label for="prim-color" class="form__label">
					Hoofdkleur
				</label>
				
				<div class="color" id="prim-color-div">
					{{ $event->prim_color }}
				</div>
				
				@error('prim-color')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				
				
			</div>
			
			<div class="form__group">
				<input
					id="sec-color"
					type="color"
					class="form__input optional @error('sec-color') is-invalid @enderror"
					name="sec-color"
					placeholder="bv. #effeff"
					value="{{ $event->sec_color }}"
					required
					autofocus
					autocomplete="off"
					onchange="changeColor('sec-color')"
				>
				
				<label for="sec-color" class="form__label">
					Secundaire kleur
				</label>
				
				<div class="color" id="sec-color-div">
					{{ $event->sec_color }}
				</div>
				
				@error('sec-color')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			@if($organisation->subscription_id === 4)
				<div class="fieldset">
					<label for="shape" class="form__label">
						vorm
					</label>
					
					<div class="checkbox__wrapper">
						<div class="row row--center">
							<input type="radio" id="round" name="shape" value="round">
							<label for="round">rond</label>
						</div>
					
					</div>
					
					<div class="checkbox__wrapper">
						<div class="row row--center">
							<input type="radio" id="square" name="shape" value="square">
							<label for="square">vierkant</label>
						</div>
					</div>
				</div>
			@endif
			
			@if($organisation->subscription_id === 3)
				<div class="fieldset">
					<label for="schedule" class="form__label">
						Weergave van de planning
					</label>
					
					<div class="checkbox__wrapper">
						<div class="row row--center">
							<input type="radio" id="timeline" name="schedule" value="timeline" {{ $event->schedule == 'timeline' ? 'checked' : ''   }}>
							<label for="timeline">tijdslijn</label>
						</div>
					</div>
					
					<div class="checkbox__wrapper">
						<div class="row row--center">
							<input type="radio" id="table" name="schedule" value="table" {{ $event->schedule == 'table' ? 'checked' : ''   }}>
							<label for="table">tabel</label>
						</div>
					</div>
					
					<div class="checkbox__wrapper">
						<div class="row row--center">
							<input type="radio" id="timetable" name="schedule" value="timetable" {{ $event->schedule == 'timetable' ? 'checked' : ''   }}>
							<label for="timetable">timetable</label>
						</div>
					</div>
				</div>
			@endif
			
			<div class="row row--center in-form">
				<a href="{{ route('org.dashboard', ['user_id' => Auth::user()->id]) }}" class="btn is-cancel">
					annuleren
				</a>
				
				<button type="submit" class="btn btn--full">
					sla de bewerkingen op
				</button>
			</div>
		</form>
	</section>
	<script>
        function changeColor(el) {
            const color = document.getElementById(el).value;
            document.getElementById( el + "-div").innerHTML = color;
        }
	</script>
@endsection