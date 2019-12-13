@extends('layouts.masterlayout')
@section('title')
    eventify
@endsection
@section('content')
    <section class="slideshow">
        <div class="slideshow__content row row--stretch">
            <div class="ctn--image">
                <img src="https://images.pexels.com/photos/196652/pexels-photo-196652.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
            </div>
            <div class="slideshow__text">
                <h1>
                    Kleurenfeest
                </h1>
                <p>
                    Geniet mee van de spetterende kleuren.
                </p>
                <a class="btn btn--white" href="{{ route('event.detail') }}"> bekijk event</a>
            </div>
        </div>
    </section>
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