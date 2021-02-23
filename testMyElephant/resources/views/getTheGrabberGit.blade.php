<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>testMyElephant</title>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{asset("vendor/cookie-consent/css/cookie-consent.css")}}">
</head>
<body>
    <div class="home">
        <div class="sections">
            <div class="leftSide">
            <div class="logo_homePage"></div>
            <div class="formSection">
                <form class="formCloneRepo" method="post" action="{{route('cloneRepo')}}">
                    @csrf
                    <h3 class="bold largeFont">Veuillez entrer l'url de votre repository Github ainsi qu'un nom à lui donner !</h3>
                    <input type="text" name="repo" placeholder="URL du repository à examiner">

                    <div class="line"></div>

                    <input  type="text" name="repositoryName" placeholder="Nom à donner à votre repository">
                    <div class="line"></div>

                    {{--TODO rendre nullable la colonne scanRapport en DB et enlever l'input scanRapport ci-dessous--}}
                    <input  type="text" name="scanRapport" value="Toto">
                    <div class="line"></div>

                    <button class="btn" type="submit">Cloner </button>
                </form>
            </div>
            </div>
            <div class="rapportSection">
            </div>
        </div>
        @include("Components.Navbar")
    </div>
</body>
</html>

