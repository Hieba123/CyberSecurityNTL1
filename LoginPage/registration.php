<?php
session_start(); // Start der Session

// Überprüfen, ob der Benutzer angemeldet ist
if (!isset($_SESSION['angemeldet1']) || $_SESSION['angemeldet1'] !== true) {
    // Benutzer ist nicht angemeldet, daher Weiterleitung zur Anmeldeseite
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weihnachtsveranstaltung - Anmeldung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #ff6600;
        }
        .event-details {
            background-color: #ffcc99;
            border: 1px solid #ff6600;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
        }
        .event-details h2 {
            color: #ff6600;
        }
        form {
            text-align: center;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #ff6600;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #cc5500;
        }
        p {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Anmeldung zur Weihnachtsfeier</h1>
        <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
            <input type="text" name="vorname" placeholder="Vorname" required><br>
            <input type="text" name="nachname" placeholder="Nachname" required><br>
            <input type="submit" value="Anmelden">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vorname = $_POST["vorname"];
            $nachname = $_POST["nachname"];
            require('anmeldung.php');
            $result=0;
            $result=eintragHinzufuegen($vorname,$nachname);
            if($result==0){
            echo "<p>Vielen Dank, $vorname $nachname, für deine Anmeldung zur Weihnachtsfeier!</p>";
            }
        }
        ?>
        <div class="event-details">
            <h2>Veranstaltungsdetails</h2>
            <p><strong>Beginn:</strong> 17. Dezember 2023, 18:30 Uhr</p>
            <p><strong>Ort:</strong> Gasthaus Veigl in Loosdorf</p>
            <p><strong>Beschreibung:</strong> Wir laden dich herzlich zu unserer jährlichen Weihnachtsfeier ein. Wir freuen uns auf Dein Kommen!</p>
        </div>
    </div>
</body>
</html>

