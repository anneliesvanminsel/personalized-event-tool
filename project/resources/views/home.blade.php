@extends('layouts.masterlayout')
@section('title')
    evento
@endsection
@section('content')
    <div
        id="event-slider"
        data-event1="{{ $event1 }}"
        data-event2="{{ $event2 }}"
        data-event3="{{ $event3 }}"
        data-url1="{{ route('event.detail', ['event_id' => $event1->id]) }}"
        data-url2="{{ route('event.detail', ['event_id' => $event2->id]) }}"
        data-url3="{{ route('event.detail', ['event_id' => $event3->id]) }}"
        data-image1="{{ asset('images/' . $event1['logo']) }}"
        data-image2="{{ asset('images/' . $event2['logo']) }}"
        data-image3="{{ asset('images/' . $event3['logo']) }}"
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
                    <div class="item__image ctn--image">
                        <img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
                    </div>
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