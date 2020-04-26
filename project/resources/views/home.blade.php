@extends('layouts.masterlayout')
@section('title')
    evento
@endsection
@section('content')
    @desktop
        <div class="hero">
	        <div class="hero__image">
		        @if(File::exists(public_path() . "/images/brunch.jpeg"))
			        <img src="{{ asset('images/brunch.jpeg') }}" alt="">
		        @else
			        <img src="https://placekitten.com/600/600" alt="">
		        @endif
	        </div>
	        <div class="hero__content">
		        <h1 class="logo hero__logo">
			        evento
		        </h1>
		        <div>
			        Het platform voor jouw eventsnoden
		        </div>
	        </div>
        </div>
	    <div class="card--container is-pull-up">
		    @foreach($highlights as $event)
			    @include('partials.card', $event)
		    @endforeach
		    @foreach($highlights as $event)
			    @include('partials.card', $event)
		    @endforeach
		    
	    </div>
        <!--div id="event-slider"
            @foreach($highlights as $event)
                data-event{{$loop->iteration}}="{{ $event }}"
                data-url{{$loop->iteration}}="{{ route('event.detail', ['event_id' => $event->id]) }}"
    
                @if(File::exists(public_path() . "/images/" . $event['logo']))
                    data-image{{$loop->iteration}}="{{ asset('images/' . $event['logo']) }}"
                @else
                    data-image1="https://placekitten.com/600/600"
                @endif
            @endforeach
        ></div-->
    
        <section class="page-alignment">
            <h1>
                Ga op avontuur
            </h1>
            <form action="{{ route('home.searchevents') }}" method="post">
                @csrf
                <div class="row row--stretch is-form">
                    <div class="form__group">
                        <select class="select" id="type" name="type">
                            <option value="not given">-- selecteer type --</option>
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
            <div class="h-grid">
                @if($searchedevents->count() > 0)
                    @foreach($searchedevents as $event)
                        <div class="h-grid__item item row row--stretch">
                            <div class="item__date bkg-red">
                                {{  date('d M', strtotime( $event['starttime'])) }}
                            </div>
        
                            @if(File::exists(public_path() . "/images/" . $event['logo']))
                                <div class="item__image ctn--image">
                                    <img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
                                </div>
                            @else
                                <div class="item__image ctn--image">
                                    <img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
                                </div>
                            @endif
        
                            <div class="item__content">
                                <div class="item__title">
                                    {{ $event->title }}
                                </div>
                                <div class="item__text">
                                    {{ $event->type }}
                                </div>
                            </div>
                            <div class="item__actions">
                                <a class="btn" href={{route('event.detail', ['event_id' => $event->id])}}>
                                    Bekijk details
                                </a>
                            </div>
                        </div>
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
    @elsedesktop
	    <section class="page-alignment">
		    <h1 class="spacing-top-s">
			    Verken evenementen
		    </h1>
	    </section>
        <section class="v-grid page-alignment">
	        @foreach($mobileevents as $event)
		        <a class="v-grid__item item" href="{{route('event.detail', ['event_id' => $event->id])}}">
			        <div class="item__date bkg-red">
				        {{  date('d M', strtotime( $event['starttime'])) }}
			        </div>
			
			        @if(File::exists(public_path() . "/images/" . $event['logo']))
				        <div class="item__image ctn--image">
					        <img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
				        </div>
			        @else
				        <div class="item__image ctn--image">
					        <img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
				        </div>
			        @endif
			
			        <div class="item__content item__title">
				        {{ $event->title }}
			        </div>
		        </a>
	        @endforeach
        </section>
	    <section>
		   
	    </section>
    @enddesktop
@endsection