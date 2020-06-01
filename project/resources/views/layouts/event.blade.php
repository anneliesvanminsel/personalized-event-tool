<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Styles & fonts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Poiret+One&display=swap" rel="stylesheet">
    
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#46d5ef">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

</head>
<body class="@yield('theme')">
    <div class="header__container {{ $event['theme'] }}">
        <header class="header">
            <div class="nav">
                <div class="row is-grow">
                    <img src="{{ asset('images/' . $event['logo'] ) }}" alt="">
                    <div>
                        {{ $event->title }}
                    </div>
                </div>
                
                <div class="nav__bar">
                    <a class="nav__link" href="#tickets">
                        tickets
                    </a>
                    <a class="nav__link" href="#schedule">
                        planning
                    </a>
                    
                    @guest
                        <a class="nav__link" href="{{ route('login') }}">
                            aanmelden
                        </a>
                    @else
                        @if(Auth::user()->role == "organisator")
                            <a class="nav__link {{ (strpos(Route::currentRouteName(), 'org.dashboard') === 0) ? 'active' : '' }}" href="{{ route('org.dashboard', ['user_id' => Auth::user()->id]) }}">
                                dashboard
                            </a>
                        @else
                            <a class="nav__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) || (strpos(Route::currentRouteName(), 'user.events') === 0) || (strpos(Route::currentRouteName(), 'user.favorites') === 0) ? 'active' : '' }}" href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}">
                                {{ Auth::user()->name }}
                            </a>
                        @endif
                    @endguest
                </div>
            </div>
            
            <button class="btn is-icon nav-icon">
                <span class="is-middle"></span>
            </button>
        </header>
    </div>
    
    <script>
        ( ()=> {
            const button = document.querySelector('.nav-icon');
            button.addEventListener('click', () => {
                document.querySelector('.nav').classList.toggle('is-open');
            })
        })();
    </script>
    
    <main>
        @yield('content')
    </main>

    @php
        $organisation = $event->organisation;
        $address = $organisation->address->first();
    @endphp

    <style>
        .footer--container {
            background-color: {{ $event['prim_color'] }};
        }
        
        .sub-footer {
            background-color: {{ $event['sec_color'] }};
        }
    </style>
    
    <div class="footer--container {{ $event['theme'] }}">
        <footer class="footer">
            <div class="">
                {{ $organisation->name }}
            </div>
            <div class="row row--stretch">
                <ul class="list spacing-top-s">
                    <li class="list__item">
                        {{ $organisation->name }}
                    </li>
                    <li class="list__item">
                        {{ $address->street . ', ' . $address->streetnumber }}
                    </li>
                    <li class="list__item">
                        {{ $address->postalcode }} {{ $address->city }}
                    </li>
                    <li class="list__item">
                        <a href="mailto:{{ $organisation->users->first()->email }}?Subject=Hello%20again" target="_top">
                            {{ $organisation->users->first()->email }}
                        </a>
                    </li>
                </ul>
            
                <ul class="list spacing-top-s">
                    <li class="list__item">
                        <h5>
                            Bezoekers
                        </h5>
                    </li>
                    <li class="list__item">
                        <a class="list__link {{ (strpos(Route::currentRouteName(), 'index') === 0) ? 'active' : '' }}" href="{{ route('index') }}">
                            zoek evenementen
                        </a>
                    </li>
                    <li class="list__item">
                        @guest
                            <a class="list__link" href="{{ route('register') }}">
                                maak nu een account
                            </a>
                        @else
                            @if(Auth::user()->role === "volunteer" || Auth::user()->role === "guest" )
                                <a class="list__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}" href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}#tickets">
                                    bekijk mijn tickets
                                </a>
                            @endif
                        @endguest
                    </li>
                </ul>
            
                <ul class="list spacing-top-s">
                    <li class="list__item">
                        <h5>
                            Bedrijven
                        </h5>
                    </li>
                    <li class="list__item">
                        <a class="list__link {{ (strpos(Route::currentRouteName(), 'start.organisation') === 0) ? 'active' : '' }}" href="{{ route('start.organisation') }}">
                            abonnementen
                        </a>
                    </li>
                    <li class="list__item">
                        <a class="list__link" href="{{ route('start.organisation') }}">
                            maak een event aan
                        </a>
                    </li>
                </ul>
            </div>
        </footer>
        <div class="sub-footer">
            <div class="sub-footer__content row row--center">
                <div class="row">
                    event op <a href="{{ route('index') }}" style="margin-left: 5px;">www.evento.be</a>.
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>