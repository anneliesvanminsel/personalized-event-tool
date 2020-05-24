@desktop
    <div class="header__container">
        <header class="header">
            <a class="logo has-line" href="{{ route('index') }}">
                evento
            </a>
            
            <div class="nav">
                <a class="nav__link {{ (strpos(Route::currentRouteName(), 'start.organisation') === 0) ? 'active' : '' }}" href="{{ route('start.organisation') }}">
                    voor organisatoren
                </a>
            </div>
            
            <div>
                @guest
                    <a class="btn btn--purple btn--small" href="{{ route('start.organisation') }}">
                        maak een event
                    </a>
                @else
                    @if(Auth::user()->role == "organisator")
                        <a class="btn btn--purple btn--small" href="{{ route('event.create', ['organisation_id' => Auth::user()->organisation_id]) }}">
                            maak een event
                        </a>
                    @endif
                @endguest
                
            </div>
            
            <div>
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
                        <a class="nav__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}" href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}">
                            account
                        </a>
                    @endif
                @endguest
            </div>
        </header>
    </div>
@elsedesktop
    <nav class="mobile-nav">
        <ul class="mobile-nav__bar">
            <li class="mobile-nav__item">
                <a class="mobile-nav__link {{ (strpos(Route::currentRouteName(), 'index') === 0) ? 'active' : '' }}" href="{{ route('index') }}">
                    @svg('home')
                </a>
            </li>
            <li class="mobile-nav__item">
                <a class="mobile-nav__link {{ (strpos(Route::currentRouteName(), 'mobile.search') === 0) ? 'active' : '' }} {{ (strpos(Route::currentRouteName(), 'mobile.postsearch') === 0) ? 'active' : '' }}" href="{{ route('mobile.search') }}">
                    @svg('search')
                </a>
            </li>
            
            <li class="mobile-nav__item">
                <a class="mobile-nav__link {{ (strpos(Route::currentRouteName(), 'mobile.events') === 0) ? 'active' : '' }} {{ (strpos(Route::currentRouteName(), 'event.special') === 0) ? 'active' : '' }}" href="{{ route('mobile.events') }}">
                    @svg('heart')
                </a>
            </li>
            <li class="mobile-nav__item">
                <a class="mobile-nav__link {{ (strpos(Route::currentRouteName(), 'mobile.ticket') === 0) ? 'active' : '' }}" href="{{ route('mobile.ticket') }}">
                    @svg('ticket')
                </a>
            </li>
            
            @guest
                <li class="mobile-nav__item">
                    <a class="mobile-nav__link" href="{{ route('login') }}">
                        @svg('account')
                    </a>
                </li>
            @endguest
        </ul>
    </nav>
@enddesktop

