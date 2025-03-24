<?php
$db = new SQLite3('diariLocal.db');
$termeCerca = $_POST['termeCerca']; 
if (!empty($termeCerca)) {
    $sqlParcial = "SELECT * FROM noticies WHERE not_titular LIKE :termeCerca";
    $stmtParcial = $db->prepare($sqlParcial);
    $stmtParcial->bindValue(':termeCerca', "%" . $termeCerca . "%", SQLITE3_TEXT); 
    $resultatsParcial = $stmtParcial->execute();
    echo "<h3>Resultats per titular parcial:</h3>";
    $trobat = false;
    while ($fila = $resultatsParcial->fetchArray(SQLITE3_ASSOC)) {
        echo "id: " . $fila['not_id'] . " Titular: " . $fila['not_titular'] . " Cos: " . $fila['not_cos'] . " Data: " . $fila['not_data'] . " Secció: " . $fila['not_seccio'] . "<br>";
        $trobat = true;
    }

    if (!$trobat) {
        echo "No s'han trobat notícies amb el titular parcial.";
    }
} else {
    echo "No s'ha introduït cap terme de cerca.";
}

// Tancar la connexió
$db->close();
?>
