@extends('layouts.masterlayout')
@section('title')
    evento
@endsection
@section('content')
    <div
        id="event-slider"
        @foreach($slideevents as $event)
            data-event{{$loop->iteration}}="{{ $event }}"
            data-url{{$loop->iteration}}="{{ route('event.detail', ['event_id' => $event->id]) }}"

            @if(File::exists(public_path() . "/images/" . $event['logo']))
                data-image{{$loop->iteration}}="{{ asset('images/' . $event['logo']) }}"
            @else
                data-image1="https://placekitten.com/600/600"
            @endif
        @endforeach
    ></div>

    <section class="page-alignment">
        <h1>
            Ga op avontuur
        </h1>
        <form action="">
            <div class="row row--stretch">
                <div class="form__group">
                    <input
                        id="title"
                        type="text"
                        class="form__input @error('title') is-invalid @enderror"
                        name="logo"
                        placeholder="Welk event zoek je?"
                        value="{{ old('title') }}"
                        required
                        autocomplete="off"
                    >

                    <label for="logo" class="form__label">
                        Event naam
                    </label>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ title }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form__group">
                    <input
                        id="logo"
                        type="text"
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

                <button type="submit" class="btn btn--full">
                    zoek
                </button>
            </div>
        </form>
        <div class="h-grid">
            @foreach($searchedevents as $event)
                <div class="h-grid__item item row row--stretch">
                    <div class="item__date bkg-red">
                        17 dec
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
                        <a class="item__remind" href="#">
                            Herinner mij
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection