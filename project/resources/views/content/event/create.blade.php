@extends('layouts.masterlayout')
@section('title')
	evento - maak event
@endsection
@section('content')
	<section class="page-alignment">
		<h1>
			Maak jouw evenement
		</h1>

		<form method="POST" action="{{ route('event.postcreate') }}" class="form" enctype="multipart/form-data">
			@csrf

			<h2>
				1. Algemene gegevens
			</h2>

			<div class="form__group">
				<input
					id="title"
					type="text"
					class="form__input @error('title') is-invalid @enderror"
					name="title"
					placeholder="bv. Rock Werchter of Kerstdrink 2019"
					value="{{ old('title') }}"
					required
					autofocus
					autocomplete="off"
				>

				<label for="title" class="form__label">
					De titel van het event
				</label>

				@error('title')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>


			<div class="form__group">
				<input
					id="description"
					type="text"
					class="form__input @error('description') is-invalid @enderror"
					name="description"
					placeholder="bv. het event van de eeuw"
					value="{{ old('description') }}"
					required
					autocomplete="off"
				>

				<label for="description" class="form__label">
					Korte beschrijving
				</label>

				@error('description')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<div class="form__group">
				<input
					id="logo"
					type="file"
					class="form__input @error('logo') is-invalid @enderror"
					name="logo"
					placeholder="bv. het event van de eeuw"
					value="{{ old('logo') }}"
					required
					autocomplete="off"
				>

				<label for="logo" class="form__label">
					hoofdafbeelding
				</label>

				@error('logo')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<h2>
				2. Technische informatie
			</h2>

			<div class="form__group">
				<input
					id="type"
					type="text"
					class="form__input @error('type') is-invalid @enderror"
					name="type"
					placeholder="bv. het event van de eeuw"
					value="{{ old('type') }}"
					required
					autocomplete="off"
				>

				<label for="type" class="form__label">
					evenementstype
				</label>

				@error('type')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>


			<div class="form__group">
				<input
					id="status"
					type="text"
					class="form__input @error('status') is-invalid @enderror"
					name="status"
					placeholder="bv. het event van de eeuw"
					value="{{ old('status') }}"
					required
					autocomplete="off"
				>

				<label for="status" class="form__label">
					status
				</label>

				@error('status')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<h2>
				3. Opmaak mogelijkheden
			</h2>

			<div class="form__group">
				<input
					id="bkgcolor"
					type="text"
					class="form__input @error('bkgcolor') is-invalid @enderror"
					name="bkgcolor"
					placeholder="bv. #112233"
					value="{{ old('bkgcolor') }}"
					autocomplete="off"
				>

				<label for="bkgcolor" class="form__label">
					Achtergrondkleur
				</label>

				@error('bkgcolor')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>


			<div class="form__group">
				<input
					id="textcolor"
					type="text"
					class="form__input @error('textcolor') is-invalid @enderror"
					name="textcolor"
					placeholder="bv. #112233"
					value="{{ old('textcolor') }}"
					autocomplete="off"
				>

				<label for="textcolor" class="form__label">
					Tekstkleur
				</label>

				@error('textcolor')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>


			<div class="">
				<button type="submit" class="btn btn--full">
					Maak het evenement aan
				</button>
			</div>
		</form>
	</section>
@endsection