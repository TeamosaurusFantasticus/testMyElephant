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
//initiate numberOfVuln to display vulnerability number on each vulnerability card title
    $numberOfVuln = 1;
?>

@foreach ($finalResult as $vulnerability)
    <div class="containerVuln">
        <div class="report">
            <h2 class="vulnTitle">Vulnerability n°{{$numberOfVuln}}</h2>
            <div class="vulnDetails">
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
    <?php $numberOfVuln ++; ?>
@endforeach
@include("Components.Navbar")
</body>
</html>
