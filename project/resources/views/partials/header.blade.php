@desktop
    <header class="header">
        <a class="logo logo--link" href="{{ route('index') }}">
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
                    <li class="nav__item">
                        <a class="nav__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}" href="{{ route('user.account', ['id' => Auth::user()->id]) }}">
                            account
                        </a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"
                        >
                            Afmelden
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>
@elsedesktop
    <nav class="mobile-nav">
        <ul class="mobile-nav__bar">
            <li class="mobile-nav__item">
                <a class="mobile-nav__link {{ (strpos(Route::currentRouteName(), 'index') === 0) ? 'active' : '' }}" href="{{ route('index') }}">
                    startpagina
                </a>
            </li>
            <li class="mobile-nav__item">
                <a class="mobile-nav__link " href="">
                    zoeken
                </a>
            </li>
            <li class="mobile-nav__item">
                <a class="mobile-nav__link " href="">
                    opgeslagen evenementen
                </a>
            </li>
            <li class="mobile-nav__item">
                <a class="mobile-nav__link " href="">
                    tickets
                </a>
            </li>
            <li class="mobile-nav__item">
                <a class="mobile-nav__link " href="">
                    account
                </a>
            </li>
            @guest
                <li class="nav__item">
                    <a class="nav__link" href="{{ route('login') }}">
                        aanmelden
                    </a>
                </li>
            @else
                <li class="nav__item">
                    <a class="nav__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}" href="{{ route('user.account', ['id' => Auth::user()->id]) }}">
                        account
                    </a>
                </li>
                <li class="nav__item">
                    <a class="nav__link"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"
                    >
                        Afmelden
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endguest
        </ul>
    </nav>
@enddesktop

