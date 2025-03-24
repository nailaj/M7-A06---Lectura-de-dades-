<?php
$db = new SQLite3('diariLocal.db');
$resultats = $db->query("SELECT * FROM  noticies");


?>