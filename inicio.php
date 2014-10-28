<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inicio
 *
 * @author oscar
 */
class Bingo {

    function Cantar() {
        return (mt_rand(1, 74));
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

}

$numeros = array();

$bingo = new Bingo();



// Buscamos todos los numeros que han salido en el archivo bingo.txt y lo almacenamos en un array
$fp = fopen("bingo.txt", "r");
while (!feof($fp)) {
    $linea = fgets($fp);
    array_push($numeros, $linea);
}

fclose($fp);
sort($numeros, SORT_NUMERIC);



do {
    $digito = $bingo->Cantar();
// Verificamos que el numero no este reperido
    if (!in_array($digito, $numeros)) {
        $fp = fopen("bingo.txt", "a+");
        fwrite($fp, $digito . PHP_EOL);
        fclose($fp);
        $seguir = false;
    } else {
        $seguir = true;
    }
} while (count($numeros) < 75 && $seguir);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>UNEFA - Bingo!!!</title>
        <style type="text/css">
            .classname{ font-size:70px; color:#FFF; }            
            .classname { border:solid 1px #2d2d2d;  text-align:center; background:#575757; padding:100px 50px 100px 50px;  -moz-border-radius: 5px;  -webkit-border-radius: 5px; border-radius: 5px;}
            .classname{background:-moz-linear-gradient(80% 74% 360deg, #0072AE, #FF0031 6%) }

        </style>
    </head>

    <body>
        <div class="classname">
            <?php
            $contador = count($numeros);
            if ($contador < 75) {
                echo $bingo->Asociar($digito) . " " . $digito;
                
            } else {
                echo "<h1>BINGO!!!</h1>";
            }
            ?>
        </div>

        <?php
        if ($contador > 1) {
//            print_r($numeros);
            ?>
            <div class="matriz">
                <table cellspacing="20" border="2" width="100%">
                    <tbody>
                        <?php
                        echo "<tr>";
                        for ($j = 1; $j < $contador; $j++) {
                            switch ($j) {
                                case ($j % 10 === 0):
                                    echo "<td> $numeros[$j] </td></tr> <tr>";
                                    break;
                                default:
                                    echo "<td> $numeros[$j] </td>";
                                    break;
                            }
                        }
                        echo "</tr>";
                        ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>

    </body>
</html>

<form>
    <button> Cantar </button>
</form>