{{--<?php--}}

{{--$resultInJsonFormat = '';--}}
{{--?>--}}

{{--@foreach ($resultscan as $value)--}}
{{--    <?php--}}
{{--    $resultInJsonFormat .= $value;--}}
{{--    ?>--}}
{{--@endforeach--}}
{{--<?php--}}
{{--$finalResult = json_decode($resultInJsonFormat);--}}
{{--//       dd(getType($finalResult), $finalResult);--}}
{{--?>--}}
{{--@foreach ($finalResult as $vulnerability)--}}
{{--    <p>Type de faille : {{ $vulnerability->vuln_name }} </p>--}}
{{--    <p>Fichier concerné : {{ $vulnerability->sink_file }}</p>--}}
{{--    <p>Instruction responsable de la faille : {{ $vulnerability->sink_name }}</p>--}}
{{--    <p>Ligne à laquelle se trouve l'instruction responsable de la faille : {{ $vulnerability->sink_line }}</p>--}}
{{--    <p>Catégorie de la faille : {{ $vulnerability->vuln_cwe }}</p>--}}
{{--@endforeach--}}

{{--<a href="https://cwe.mitre.org/">Lien vers la base de données de la MITRE</a>--}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reportStyle.css">
</head>
<body>


<?php

$resultInJsonFormat = '';
$value ='';
$numberOfVuln = 1;
?>

@foreach ($resultscan as $value)

    <?php

    $resultInJsonFormat .= $value;

    ?>
@endforeach
<?php
$finalResult = json_decode($resultInJsonFormat);
//       dd(getType($finalResult), $finalResult);
?>
@foreach ($finalResult as $vulnerability)
    {{-- <p>Type de faille : {{ $vulnerability->vuln_name }} </p>
    <p>Fichier concerné : {{ $vulnerability->sink_file }}</p>
    <p>Instruction responsable de la faille : {{ $vulnerability->sink_name }}</p>
    <p>Ligne à laquelle se trouve l'instruction responsable de la faille : {{ $vulnerability->sink_line }}</p>
    <p>Catégorie de la faille : {{ $vulnerability->vuln_cwe }}</p> --}}


    <div class="containerVuln">
{{--        <h3 class="reportTitle">Report of : {{$name}}</h3>--}}
            <div class="report">
                <h2 class="vulnTitle">Vulnerability n°{{$numberOfVuln}}</h2>
                <div class="vulnDetails">

{{--                    <div class="vul-container"></div>--}}
                    <div class="vul_Type--container">
                        <h2>Type</h2>
                        <h3 class="vuln_type">{{ $vulnerability->vuln_type }}</h3>
                    </div>
                    <div class="vul_Name--container">
                        <h2>Name</h2>
                        <h3 class="vuln_name">{{ $vulnerability->vuln_name }}</h3>
                    </div>
                </div>
                <div class="lineReport"></div>
                <div class="sourceAndSinkDetails">

{{--                    <div class="sourceDetails">--}}
{{--                        <h2>Source details</h2>--}}
{{--                        <h3>Name of source</h3>--}}
{{--                        <div class="source_name">{{ $vulnerability->source_name }}</div>--}}

{{--                        <h3>Column of source</h3>--}}
{{--                        <div class="source_column">{{ $vulnerability->source_column }}</div>--}}

{{--                        <h3>Line of source</h3>--}}
{{--                        <div class="source_line">{{ $vulnerability->source_line }}</div>--}}

{{--                        <h3>File of source</h3>--}}
{{--                        <div class="source_file">{{ $vulnerability->source_file }}</div>--}}

{{--                    </div>--}}
                    <div class="sinkDetails">
                        <br>
                        <h3>Sink details</h3>
                        <div class="sink_name"> <strong>Name :</strong> {{ $vulnerability->sink_name }}</div><br>

                        <div class="sink_line"><strong>Line :</strong> {{ $vulnerability->sink_line }}</div><br>

                        <div class="sink_file"><strong>File :</strong> {{ $vulnerability->sink_file }}</div><br>

                        <div class="vuln_cwe"><strong>Code CWE :</strong> {{ $vulnerability->vuln_cwe }}</div><br>

                        <p>Find some details about your vulnerability on : <a href="https://cwe.mitre.org/">cwe.mitre.org</a></p>


                    </div>
                </div>
            </div>
    </div>

<?php    $numberOfVuln ++; ?>
@endforeach


@include("Components.Navbar")

</body>
</html>
