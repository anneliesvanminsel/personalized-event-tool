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
                <li class="nav__item">
                    <a class="nav__link" href="{{ route('login') }}">
                        aanmelden
                    </a>
                </li>
            </ul>
        </nav>
    </header>
@elsedesktop
    <nav class="mobile-nav">
        <ul class="mobile-nav__bar">
            <li class="mobile-nav__item">
                <a class="mobile-nav__link {{ (strpos(Route::currentRouteName(), 'index') === 0) ? 'active' : '' }}" href="{{ route('index') }}">
                    evenementen
                </a>
            </li>
            <li class="mobile-nav__item">
                <a class="mobile-nav__link {{ (strpos(Route::currentRouteName(), 'start.organisation') === 0) ? 'active' : '' }}" href="{{ route('start.organisation') }}">
                    voor organisatoren
                </a>
            </li>
            <li class="mobile-nav__item">
                <a class="mobile-nav__link" href="{{ route('login') }}">
                    aanmelden
                </a>
            </li>
        </ul>
    </nav>
@enddesktop

