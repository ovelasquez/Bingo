<?php

function Cantar() {
    $numero = mt_rand(1, 74);
    return ($numero);
}

function Asociar($miNumero) {
    switch ($miNumero) {
        case ($miNumero > 0 && $miNumero < 16): return ('B');
            break;
        case ($miNumero > 15 && $miNumero < 31): return ('I');
            break;
        case ($miNumero > 30 && $miNumero < 46): return ('N');
            break;
        case ($miNumero > 45 && $miNumero < 61): return ('G');
            break;
        case ($miNumero > 60 && $miNumero < 75): return ('O');
            break;
    }
}

$numeros = array();
$miNumero = Cantar();

if (!in_array($miNumero, $numeros)) {
    array_push($numeros, $miNumero);
    echo "Por la letra " . Asociar($miNumero) . " " . $miNumero . "</br>";
}

$miNumero = Cantar();

asort($numeros);
foreach ($numeros as $key => $val) {
    echo "$val\n";
}
?>