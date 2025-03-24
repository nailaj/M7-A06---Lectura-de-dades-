<?php
$db = new SQLite3('diariLocal.db');
$resultat = $db->querySingle("SELECT COUNT(*) as total FROM noticies WHERE strftime('%m', not_data) = '02'");
echo "Nombre de notícies al febrer: " . $resultat;
$db->close();
?>
