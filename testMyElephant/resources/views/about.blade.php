<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>testMyElephant | à propos</title>
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    </head>
    <body>
    <div class="aboutPage">
            <div class="flex">
                <a class="logo_scanner" href="{{route('getTheGrabberGit')}}">
                    <div class="logo_white"></div>
                </a>
            </div>
            <h2 class="aboutTitle bold">A propos</h2><br>
            <div class="aboutContent bgWhite">
                <h3><strong>Qui sommes-nous ?</strong> </h3><br>
                <p>
                    La première version du site testMyElephant a été développé par quatres codeurs (Claire, Gaël, Thibault et Alix)
                    dans le cadre d'un projet de gorupe de l'organisme de formation IT-AKADEMY lors de la formation Développeur Full-stack 2020-2021.
                    Ce projet est OPEN-SOURCE, nous aurons plaisir à travailler avec vous sur ce projet ! Voici le lien github : <a class="bold" href="https://github.com/it-akademy-students/hackathon-developpement-securite-teamosaurus-fantasticus.git">Projet Github testMyElephant</a>
                </p><br>
                <h3 class="bold">Comment ça marche ?</h3><br>
                <p>testMyElephant fonctionne grâce à deux procédés : nous clonons le repository sur notre serveur le temps de le traiter,
                    puis nous le scannons grâce à la librairie <a href="https://github.com/designsecurity/progpilot">PROGPILOT</a> qui déterminera si il y a des failles de sécurité dans le code PHP.</p><br>
                <h3 class="bold">Où trouver des informations sur les failles de sécurité?</h3><br>
                <p>Voici plusieurs sites de références en la matières :
                    <ul>
                        <li><a class="bold" href="https://cwe.mitre.org/">CWE</a></li>
                        <li><a class="bold" href="https://owasp.org/">OWASP</a></li>
                    </ul>
                </p>
            </div>
    </div>
    @include("Components.Navbar")
    </body>
</html>
