
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
      <ul>
        <li><a class="bold" href="{{route("login")}}">About</a></li>
        <li><a class="bold" href="{{route("login")}}">Login</a></li>
        <li><a class="bold" href="{{route("register")}}">Register</a></li>
      </ul>
    </nav>
 </div>


  <script  type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  <script  type="text/javascript" src="{{ mix('js/app.js') }}"></script>

