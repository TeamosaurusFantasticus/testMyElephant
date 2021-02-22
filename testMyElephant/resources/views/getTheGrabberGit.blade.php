<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}" >
</head>
<body>


<div class="home">



    <div class="sections">
        <div class="formSection">
            <a href="{{route("getDeletter")}}">Suppression de repository</a>
            <a href="{{route("login")}}">Login</a>

            <form class="formCloneRepo" method="post" action="{{route('cloneRepo')}}">
                @csrf
                <h3>Veuillez rentrer l'url de votre repository Github ainsi qu'un nom à lui donner !</h3>
                <input type="text" name="repositoryURL" placeholder="URL du repository à examiner">
                <div class="line"></div>

                <input  type="text" name="repositoryName" placeholder="Nom à donner à votre repository">
                <div class="line"></div>

                <input  type="text" name="scanRapport" value="Toto">
                <div class="line"></div>
                <button class="btn" type="submit">Cloner </button>
            </form>
        </div>
        <div class="rapportSection">

        </div>
    </div>

</div>

</body>
</html>

