<div class="header__container {{ (strpos(Route::currentRouteName(), 'event.detail') === 0) ? $event['theme'] : '' }}">
    <header class="header">
        <a class="logo has-line" href="{{ route('index') }}">
            evento
        </a>
        
        <div class="nav">
            <a class="nav__link is-grow {{ (strpos(Route::currentRouteName(), 'start.organisation') === 0) ? 'active' : '' }}" href="{{ route('start.organisation') }}">
                voor organisatoren
            </a>
    
            <div class="nav__bar">
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
