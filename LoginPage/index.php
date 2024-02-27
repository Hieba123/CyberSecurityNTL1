<?php
session_start(); 
$_SESSION['angemeldet1'] = false;
$_SESSION['angemeldet2'] = false;
      
if((isset($_POST['passw']) && $_POST['passw']=="MVL")){
    $_SESSION['angemeldet1'] = true;
  
   

   header('Location: registration.php');
}
if((isset($_POST['passw']) && $_POST['passw']=="MVLAdmin")){
   
    $_SESSION['angemeldet2'] = true;

   header('Location: admin.php');
}
if((isset($_POST['passw']) && $_POST['passw']!="MVL" && $_POST['passw']!="MVLAdmin")){
    echo "<p>Falsches Passwort</p>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
        form {
            text-align: center;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="password"]:focus {
            outline: none;
            border: 1px solid #007bff;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
            <input type="password" name="passw" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
