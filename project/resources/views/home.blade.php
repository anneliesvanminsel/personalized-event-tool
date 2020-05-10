@extends('layouts.masterlayout')
@section('title')
    evento
@endsection
@section('content')
    @desktop
        <div class="hero">
	        <div class="hero__image">
		        <img src="{{ asset('images/conference.jpg') }}" alt="">
	        </div>
	        <div class="hero__content">
		        <h1 class="logo hero__logo">
			        evento
		        </h1>
		        <div class="hero__description is-large">
			        Het platform voor jouw eventsnoden
		        </div>
	        </div>
        </div>
    
	    <section class="section is-pull-up">
		    <h3 class="is-white">
			    populair vandaag
		    </h3>
		    <div class="card--container">
			    @foreach($highlights as $event)
				    @include('partials.card', $event)
			    @endforeach
		    </div>
	    </section>
    
        <section class="section">
            <h3>
                Wat is er te doen?
            </h3>
            <form action="{{ route('home.searchevents') }}" method="post" class="filter--container">
                @csrf
                <div class="row filter">
	                <div class="form__group">
		                <input
			                id="location"
			                type="text"
			                class="form__input @error('location') is-invalid @enderror"
			                name="location"
			                placeholder="locatie"
			                value="{{ old('location') }}"
			                autocomplete="location"
		                >
		                <label for="email" class="form__label">
			                locatie
		                </label>
		                
		                @error('location')
		                <span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
		                @enderror
	                </div>
	                
	                <div class="form__group">
		                <input
			                id="date"
			                type="date"
			                class="form__input @error('date') is-invalid @enderror"
			                name="date"
			                placeholder="date"
			                value="{{ old('date') }}"
			                autocomplete="date"
		                >
		                <label for="date" class="form__label">
			                datum
		                </label>
		                @error('date')
		                <span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
		                @enderror
	                </div>
	                
                    <div class="form__group">
                        <select class="select" id="type" name="type">
                            <option value="not given">Categorie</option>
                            <option value="conference">conferentie</option>
                            <option value="workshop">workshop</option>
                            <option value="reunion">reunie</option>
                            <option value="party">feest</option>
                            <option value="gala">gala</option>
                            <option value="festival">festival</option>
                            <option value="semenar">semenarie</option>
                            <option value="auction">veiling</option>
                            <option value="market">beurs</option>
                        </select>
                       
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <button type="submit" class="btn btn--small">
                        zoek
                    </button>
                </div>
            </form>
            <div class="list">
                @if($searchedevents->count() > 0)
                    @foreach($searchedevents as $event)
			            @include('partials.listitem', $event)
                    @endforeach
                @else
                    <p class="accent">
                        Er zijn geen evenementen gevonden.
                    </p>
                @endif
            </div>
            <div>
                {{ $searchedevents->links() }}
            </div>
        </section>

	    <section class="section">
		    <div class="row row--center">
			    <h3>
				    populair bij jou in de buurt
			    </h3>
			    {{ $popularevents->links('vendor.pagination.simple') }}
		    </div>
		    
		    <div class="card--container">
			    <div class="card">
				    <div class="cover">
					    <img src="{{ asset('images/brunch.jpeg') }}">
				    </div>
				    <div class="cover__text row">
					    @svg('location', 'is-white is-large') Leuven
				    </div>
			    </div>
			    @foreach($popularevents as $event)
				    @include('partials.card', $event)
			    @endforeach
		    </div>
	    </section>
    @enddesktop
@endsection