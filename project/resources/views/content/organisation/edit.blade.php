@extends('layouts.organisation')
@section('title')
	evento - organisatie bewerken
@endsection
@section('content')
	<div class="content">
		<div class="section__nav nav">
			<div class="nav__tabs">
				<p class="nav__item tab__links active">
					organisatie gegevens
				</p>
				<p class="nav__item tab__links">
					adresgegevens
				</p>
			</div>
		</div>
		
		<div class="">
			<section class="">
				<form method="POST" action="{{ route('organisation.postupdate', ['organisation_id' => $organisation['id']]) }}"
				      class="form spacing-top-m" enctype="multipart/form-data" id="form-create">
					@csrf
					
					<div class="container">
						<div class="">
							<div class="card__header">
								<h3>
									informatie van jouw organisatie
								</h3>
								<div class="tab-content spacing-top-m">
									<div class="form__group">
										<input
											id="name"
											class="form__input"
											type="text"
											name="name"
											value="{{ $organisation->name }}"
											placeholder="bv. Jan Peeters"
										>
										<label class="form__label" for="username">
											Organisatienaam
										</label>
										
										@error('name')
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
											value="{{ $organisation->logo }}"
											autocomplete="off"
										>
										
										<label for="logo" class="form__label">
											logo
										</label>
										
										@error('logo')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									
									<div class="form__group">
										
										<textarea
											form="form-create"
											id="description"
											class="form__input @error('description') is-invalid @enderror"
											name="description"
											placeholder="Een korte beschrijving van jouw evenement."
											required
											autocomplete="off"
											maxlength="1000"
										>{{ $organisation->description }}</textarea>
										
										<label for="description" class="form__label">
											Korte beschrijving
										</label>
										
										<div id="word-counter" class="form__label is-counter"></div>
										
										<script>
                                            document.getElementById('description').onkeyup = function () {
                                                document.getElementById('word-counter').innerHTML = this.value.length + "/1000";
                                            };
										</script>
										
										@error('description')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									
									<div class="spacing-top-m row row--center in-form">
										<a href="{{ route('index') }}" class="btn is-cancel">
											annuleren
										</a>
										
										<button type="submit" class="btn btn--full">
											gegevens bewerken
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>
@endsection