@extends('layouts.masterlayout')
@section('title')
    eventify
@endsection
@section('content')
    <div id="event-slider" data-event1="{{ $event1 }}" data-event2="{{ $event2 }}" data-event3="{{ $event3 }}"></div>

    <section class="grid">
        <h1>
            Ga op avontuur
        </h1>
        <div>
            hier komen de filters
        </div>
        <div>
            hierkomt de lijst met de verschillende events
        </div>
    </section>
@endsection