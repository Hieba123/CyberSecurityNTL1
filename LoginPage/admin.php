<?php
session_start(); // Start der Session

// Überprüfen, ob der Benutzer angemeldet ist
if (!isset($_SESSION['angemeldet2']) || $_SESSION['angemeldet2'] !== true) {
    // Benutzer ist nicht angemeldet, daher Weiterleitung zur Anmeldeseite
    header('Location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>&Uuml;bersicht der Anmeldungen </h1>
    <?php
   
    // Der Benutzer ist angemeldet und hat Zugriff auf diese Seite
    
    
    require('anmeldung.php');

    echo "Gesamtanzahl der Anmeldungen: ". anzahlReihen().". </br>" ;
    echo "</br>";
    zeigeUebersichtTabelle();
    
    ?>
</body>
</html>