<?php
/*session_start();
//session_start(); // Start der Session

// Überprüfen, ob der Benutzer angemeldet ist
if (!isset($_SESSION['angemeldet1']) || $_SESSION['angemeldet1'] !== true || $_SESSION['angemeldet2'] !== true) {
    // Benutzer ist nicht angemeldet, daher Weiterleitung zur Anmeldeseite
    header('Location: index.php');
    exit;
}*/
// Verbindung zur MariaDB-Datenbank in XAMPP herstellen
function anzahlReihen(){
$servername = "localhost"; // Servername (in den meisten Fällen "localhost")
$username = "root"; // Ihr MySQL-Benutzername (in XAMPP ist es normalerweise "root")
$password = ""; // Ihr MySQL-Passwort (standardmäßig ist kein Passwort gesetzt)
$database = "weihnachtsfeier"; // Der Name Ihrer Datenbank


// Verbindung herstellen
$conn = new mysqli($servername, $username, $password, $database);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    
}

// SQL-Abfrage ausführen, um die Anzahl der Datensätze zu zählen
$sql = "SELECT COUNT(*) AS AnzahlDerReihen FROM feier";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $anzahlDerReihen = $row["AnzahlDerReihen"];
    return $anzahlDerReihen;
} else {
   return "Keine Datensätze gefunden.";
    
}

// Verbindung schließen
$conn->close();

}

function eintragHinzufuegen($vorname, $nachname) {
    $pruefer=0;
    // Verbindung zur Datenbank herstellen (ersetzen Sie die Verbindungsdaten)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "weihnachtsfeier";
    $conn = new mysqli($servername, $username, $password, $database);

    // Verbindung überprüfen
    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
        $pruefer=1;
    }

    // Überprüfen, ob bereits ein Eintrag mit denselben Werten existiert
    $sql = "SELECT COUNT(*) AS Anzahl FROM feier WHERE (Vorname = '$vorname' AND Nachname = '$nachname') OR (Vorname = '$nachname' AND Nachname = '$vorname')";

     $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $anzahl = $row["Anzahl"];
        if ($anzahl > 0) {
            echo "Ein Eintrag mit den gleichen Werten existiert bereits.";
            $pruefer=1;
        } else {
            // Werte in die Datenbank eintragen
            $sql = "INSERT INTO feier (Vorname, Nachname) VALUES ('$vorname', '$nachname')";
            if ($conn->query($sql) === TRUE) {
               // echo "Eintrag erfolgreich hinzugefügt.";
            } else {
                echo "Fehler beim Hinzufügen des Eintrags: " . $conn->error;
                $pruefer=1;
            }
        }
    } else {
        echo "Fehler beim Überprüfen des Eintrags: " . $conn->error;
        $pruefer=1;
    }

    // Verbindung schließen
    $conn->close();
    return $pruefer;
}

function zeigeUebersichtTabelle() {
    // Verbindung zur Datenbank herstellen (ersetzen Sie die Verbindungsdaten)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "weihnachtsfeier";
    $conn = new mysqli($servername, $username, $password, $database);

    // Verbindung überprüfen
    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    // SQL-Abfrage zur Auswahl aller Datensätze aus der Tabelle "feier"
    $sql = "SELECT * FROM feier";
    $result = $conn->query($sql);

    // Tabellenheader erstellen
    echo "<table border='1'>";
    echo "<tr><th>Anmeldenummer</th><th>Vorname</th><th>Nachname</th></tr>";

    // Datensätze aus der Datenbank in die Tabelle einfügen
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Anmeldenummer"] . "</td>";
            echo "<td>" . $row["Vorname"] . "</td>";
            echo "<td>" . $row["Nachname"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Keine Einträge gefunden</td></tr>";
    }

    // Tabellenende
    echo "</table>";

    // Verbindung schließen
    $conn->close();
}

// Beispielaufruf der Funktion
//zeigeUebersichtTabelle();


//anzahlReihen();
?>
