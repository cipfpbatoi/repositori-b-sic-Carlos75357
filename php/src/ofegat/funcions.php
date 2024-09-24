<?php
function imprimeixTauler($paraulaGuions) {
    echo "Progrés del joc:<br>\n";
    echo "+---------------------+<br>\n";
    echo "| " . implode(' | ', $paraulaGuions) . " |<br>\n";
    echo "+---------------------+\n";
}

function comprovacioIntents($paraulaAEndevinar, $lletra, &$arrayDeLletres) {
    $posicions = [];
    for ($i = 0; $i < strlen($paraulaAEndevinar); $i++) {
        if ($paraulaAEndevinar[$i] === $lletra) {
            $posicions[] = $i;
        }
    }

    if (count($posicions) > 0) {
        foreach ($posicions as $posicio) {
            $arrayDeLletres[$posicio] = $lletra;
        }
        return true;
    } else {
        return false;
    }
}
?>
