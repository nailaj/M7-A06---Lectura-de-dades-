<?php
$db = new SQLite3('diariLocal.db');

$Cercar = $_POST['Cercar']; 

if (!empty($Cercar)) {
    $sqlExacte = "SELECT * FROM noticies WHERE not_titular = :Cercar";
    $stmtExacte = $db->prepare($sqlExacte);
    $stmtExacte->bindValue(':Cercar', $Cercar, SQLITE3_TEXT);
    $resultatsExacte = $stmtExacte->execute();
    echo "<h3>Resultats per titular exacte:</h3>";
    $trobat = false;
    while ($fila = $resultatsExacte->fetchArray(SQLITE3_ASSOC)) {
        echo "id: " . $fila['not_id'] . " Titular: " . $fila['not_titular'] . " Cos: " . $fila['not_cos'] . " Data: " . $fila['not_data'] . " Secció: " . $fila['not_seccio'] . "<br>";
        $trobat = true;
    }
    if (!$trobat) {
        echo "No s'han trobat notícies amb el titular exacte.";
    }
} else {
    echo "No s'ha introduït cap terme de cerca.";
}

$db->close();
?>
