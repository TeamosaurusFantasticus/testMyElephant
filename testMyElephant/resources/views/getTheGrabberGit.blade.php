<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>testMyElephant</title>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset("vendor/cookie-consent/css/cookie-consent.css") }}">
</head>
<body>
    <div class="home">
        <div class="sections">
            <div class="leftSide">
                <div class="logo_homePage"></div>
                    @if (Illuminate\Support\Facades\Auth::check() == false)
                        <div class="formSection">
                            <div class="formSection_authFalse--txt bold">
                                Trouver les failles de sécurité de vos repositories Github en vous connectant !
                            </div>

                            <div class="formSection_authFalse--btn">
                                <a class="btn--homeAuthFalse" href="{{route("login")}}">S'identifier</a>
                                <a class="btn--homeAuthFalse" href="{{route("register")}}">S'enregistrer</a>
                            </div>
                        </div>
                    @endif

                    @if (Illuminate\Support\Facades\Auth::check())
                        <div class="formSection">
                            <form class="formCloneRepo" method="post" action="{{ route('registerRepositoryInDB') }}">
                                @csrf
                                <h3 class="bold largeFont">Veuillez entrer l'url de votre repository Github ainsi qu'un nom à lui donner !</h3>
                                <label class="hidden" for="repositoryURL">Entrer l'URL de votre repository</label>
                                <input type="text" name="repositoryURL" placeholder="URL du repository">

                                <div class="line"></div>
                                <label class="hidden" for="repositoryName">Choisissez un nom pour votre repository</label>
                                <input  type="text" name="repositoryName" placeholder="Choisissez un nom">
                                <div class="line"></div>

                                <button class="btn" type="submit">Enregistrer</button>
                            </form>
                        </div>
                    @endif
            </div>
        </div>
        @include("Components.Navbar")
    </div>
</body>
</html>

