@desktop
    <div class="header__container">
        <header class="header">
            <a class="logo logo--link is-header" href="{{ route('index') }}">
                evento
            </a>
            <nav class="nav">
                <ul class="nav__bar">
                    <li class="nav__item">
                        <a class="nav__link {{ (strpos(Route::currentRouteName(), 'index') === 0) ? 'active' : '' }}" href="{{ route('index') }}">
                            evenementen
                        </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link {{ (strpos(Route::currentRouteName(), 'start.organisation') === 0) ? 'active' : '' }}" href="{{ route('start.organisation') }}">
                            voor organisatoren
                        </a>
                    </li>
                    @guest
                        <li class="nav__item">
                            <a class="nav__link" href="{{ route('login') }}">
                                aanmelden
                            </a>
                        </li>
                    @else
                        @if(Auth::user()->role == "organisator")
                            <li class="nav__item">
                                <a class="nav__link {{ (strpos(Route::currentRouteName(), 'org.dashboard') === 0) ? 'active' : '' }}" href="{{ route('org.dashboard', ['user_id' => Auth::user()->id]) }}">
                                    dashboard
                                </a>
                            </li>
                        @else
                            <li class="nav__item">
                                <a class="nav__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}" href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}">
                                    account
                                </a>
                            </li>
                        @endif
                        <li class="nav__item">
                            <a class="nav__link"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"
                            >
                                afmelden
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav>
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
                <a class="mobile-nav__link {{ (strpos(Route::currentRouteName(), 'mobile.search') === 0) ? 'active' : '' }}" href="{{ route('mobile.search') }}">
                    @svg('search')
                </a>
            </li>
            <li class="mobile-nav__item">
                <a class="mobile-nav__link {{ (strpos(Route::currentRouteName(), 'mobile.events') === 0) ? 'active' : '' }} {{ (strpos(Route::currentRouteName(), 'event.special') === 0) ? 'active' : '' }}" href="{{ route('mobile.events') }}">
                    @svg('like')
                </a>
            </li>
            <li class="mobile-nav__item">
                <a class="mobile-nav__link {{ (strpos(Route::currentRouteName(), 'mobile.ticket') === 0) ? 'active' : '' }}" href="{{ route('mobile.ticket') }}">
                    @svg('ticket')
                </a>
            </li>
            @guest
                <li class="mobile-nav__item">
                    <a class="nav__link" href="{{ route('login') }}">
                        @svg('account')
                    </a>
                </li>
            @else
                <li class="mobile-nav__item">
                    <a class="nav__link {{ (strpos(Route::currentRouteName(), 'mobile.account') === 0) ? 'active' : '' }}" href="{{ route('mobile.account', ['id' => Auth::user()->id]) }}">
                        @svg('account')
                    </a>
                </li>
            @endguest
        </ul>
    </nav>
@enddesktop

