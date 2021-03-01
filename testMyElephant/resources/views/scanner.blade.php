<?php

$resultInJsonFormat = '';
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
    <p>Type de faille : {{ $vulnerability->vuln_name }} </p>
    <p>Fichier concerné : {{ $vulnerability->sink_file }}</p>
    <p>Instruction responsable de la faille : {{ $vulnerability->sink_name }}</p>
    <p>Ligne à laquelle se trouve l'instruction responsable de la faille : {{ $vulnerability->sink_line }}</p>
    <p>Catégorie de la faille : {{ $vulnerability->vuln_cwe }}</p>
@endforeach

<a href="https://cwe.mitre.org/">Lien vers la base de données de la MITRE</a>
