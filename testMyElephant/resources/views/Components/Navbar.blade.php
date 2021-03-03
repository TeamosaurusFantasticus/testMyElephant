
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >

 <div class="menu">
    <input id="burger" type="checkbox" style="display: none"/>

    <label for="burger">
        <span></span>
        <span></span>
        <span></span>
    </label>

    <nav>
      <ul class="menuBG" >
        <li><a class="bold" href="{{route("getTheGrabberGit")}}">ACCUEIL</a></li>
        <li><a class="bold" href="{{route("about")}}">A PROPOS</a></li>
        @if (Illuminate\Support\Facades\Auth::check() == false)
            <li><a class="bold" href="{{route("login")}}">S'IDENTIFIER</a></li>
            <li><a class="bold" href="{{route("register")}}">S'ENREGISTRER</a></li>
        @endif
          @if (Illuminate\Support\Facades\Auth::check())
              <li><a class="bold" href="{{route("profile.show")}}">PROFIL</a></li>
              <li><a class="bold" href="{{route("showUserRepositories")}}">REPOSITORIES</a></li>

              <li>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="bold logout" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                    this.closest('form').submit();">
                          SE DECONNECTER
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

