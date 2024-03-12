<?php
session_start(); 
$_SESSION['angemeldet1'] = false;
$_SESSION['angemeldet2'] = false;
      
if((isset($_POST['user']) && $_POST['user'] === "root" && isset($_POST['passw']) && $_POST['passw']=="htl") ){
    $_SESSION['angemeldet1'] = true;
    $_SESSION['user'] = $_POST['user'];
   header('Location: registration.php');
}elseif(isset($_POST['user']) && isset($_POST['passw'])) {
    echo "<p>Falsches Passwort</p>";
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
            <label for="username">Username:</label>
            <input type="text" name="user" placeholder="Username" required>
            <input type="password" name="passw" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
