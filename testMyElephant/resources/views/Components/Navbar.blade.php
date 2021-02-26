
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >



{{--
<div class="navbar" >
    <div class="menu">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    <div class="navbar_hidden">
        <a class="bold" href="{{route("login")}}">About</a>
        <div>&nbsp&nbsp|&nbsp&nbsp</div>
        <a class="bold" href="{{route("login")}}">Login</a>
        <div>&nbsp&nbsp|&nbsp&nbsp</div>
        <a class="bold" href="{{route("register")}}">Register</a>
    </div>

</div>
 --}}


 <div class="menu">
    <input id="burger" type="checkbox" style="display: none"/>

    <label for="burger">
        <span></span>
        <span></span>
        <span></span>
    </label>

    <nav>
      <ul class="menuBG" >
        <li><a class="bold" href="{{route("login")}}">About</a></li>
        @if (Illuminate\Support\Facades\Auth::check() == false)
            <li><a class="bold" href="{{route("login")}}">Login</a></li>
            <li><a class="bold" href="{{route("register")}}">Register</a></li>
        @endif
          @if (Illuminate\Support\Facades\Auth::check())
              <li><a class="bold" href="{{route("profile.show")}}">{{ __('Profile') }}</a></li>
              <li><a class="bold" href="{{route("showUserRepositories")}}">{{ __('showUserRepositories') }}</a></li>
              <li><a class="bold" href="{{route("dashboard")}}">{{ __('Dashboard') }}</a></li>
              <li>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="bold logout" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                    this.closest('form').submit();">
                          LOG OUT
                      </a>
                  </form>
              </li>
          @endif

        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <li><a class="bold" href="{{ route('api-tokens.index') }}">{{ __('API Tokens') }}</a></li>
        @endif
      </ul>
    </nav>
 </div>


  <script  type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  <script  type="text/javascript" src="{{ mix('js/app.js') }}"></script>

