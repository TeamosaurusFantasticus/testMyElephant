<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>testMyElephant | Rapport de sécurité</title>
        <link rel="stylesheet" href="../css/reportStyle.css">
        <link rel="stylesheet" href="../css/app.css">
    </head>
    <body>
    <div class="scannerPage">
        <div class="flex">
            <a class="logo_scanner" href="{{route('getTheGrabberGit')}}">
                <div class="logo_white"></div>
            </a>
        </div>
            <?php
            //initiate numberOfVuln to display vulnerability number on each vulnerability card title
                $numberOfVuln = 1;
            ?>
            @if (!$finalResult)
                <div class="noVulnMsg">
                    <h2 class="noVulnMsgTitle">Félicitations votre repository ne comporte aucune faille de sécurité PHP !</h2><br>
                    <div class="tenor-gif-embed" data-postid="12374957" data-share-method="host" data-width="30%" data-aspect-ratio="1.8644067796610169"><a href="https://tenor.com/view/elephant-dance-happy-gif-12374957">Elephant Dance GIF</a> from <a href="https://tenor.com/search/elephant-gifs">Elephant GIFs</a></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script>
                </div>
            @else
                @foreach ($finalResult as $vulnerability)
                    <div class="containerVuln">
                        <div class="report">
                            <h2 class="vulnTitle">Vulnérabilité n°{{$numberOfVuln}}</h2>
                            <div class="vulnDetails">
                                <div class="vul_Type--container">
                                    <h2>Type</h2>
                                    <h3 class="vuln_type">{{ $vulnerability->vuln_type }}</h3>
                                </div>
                                <div class="vul_Name--container">
                                    <h2>Nom</h2>
                                    <h3 class="vuln_name">{{ $vulnerability->vuln_name }}</h3>
                                </div>
                            </div>
                            <div class="lineReport"></div>
                            <div class="sourceAndSinkDetails">
                                <div class="sinkDetails">
                                    <br>
                                    <h3>Détails</h3>
                                    <div class="sink_name"> <strong>Nom :</strong> {{ $vulnerability->sink_name }}</div><br>
                                    <div class="sink_line"><strong>Ligne :</strong> {{ $vulnerability->sink_line }}</div><br>
                                    <div class="sink_file"><strong>Fichier :</strong> {{ $vulnerability->sink_file }}</div><br>
                                    <div class="vuln_cwe"><strong>Code CWE :</strong> {{ $vulnerability->vuln_cwe }}</div><br>
                                    <p>Vous trouverez plus d'informations sur cette faille grâce à son code CWE ici : <a href="https://cwe.mitre.org/">cwe.mitre.org</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $numberOfVuln ++; ?>
                @endforeach
            @endif
            @include("Components.Navbar")
    </div>

    </body>
</html>
