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
    ></div>

    <section class="grid">
        <h1>
            Ga op avontuur
        </h1>
        <div class="row">
            <div>
                lala
            </div>
            <div>
                papa
            </div>
        </div>
        <div>
            @foreach($searchedevents as $event)
                <div class="row row--stretch">
                    <div>
                        17 dec
                    </div>
                    <div class="ctn--image">
                        <img src="{{ $event->logo }}" alt="">
                    </div>
                    <div>
                        <div>
                            {{ $event->title }}
                        </div>
                        <div>
                            {{ $event->type }}
                        </div>
                    </div>
                    <div>
                        <a href={{route('event.detail', ['event_id' => $event->id])}}>
                            Bekijk details
                        </a>
                    </div>
                </div>
                <p>

                </p>
            @endforeach
            hierkomt de lijst met de verschillende events
        </div>
    </section>
@endsection