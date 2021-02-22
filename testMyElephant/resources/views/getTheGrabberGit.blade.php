<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>testMyElephant</title>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
</head>
<body>
    <div class="home">
        <div class="sections">
            <div class="leftSide">
            <div class="logo_homePage"></div>
            <div class="formSection">
                <a href="{{route("getDeletter")}}">Suppression de repository</a>
                <form class="formCloneRepo" method="post" action="{{route('cloneRepo')}}">
                    @csrf
                    <h3 class="bold largeFont">Veuillez rentrer l'url de votre repository Github ainsi qu'un nom à lui donner !</h3>
                    <input type="text" name="repo" placeholder="URL du repository à examiner">
                    <div class="line"></div>
                    <input  type="text" name="namerepo" placeholder="Nom à donner à votre repository">
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

