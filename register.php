<?php

session_start();

require "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $hashed_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO gebruikers (username, email, wachtwoord) VALUES (?, ?, ?)");
    $stmt->bindparam(1, $username);
    $stmt->bindparam(2, $email);
    $stmt->bindparam(3, $hashed_wachtwoord);

    $stmt->execute();
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="body1">
    <div class="login">
        <form action="register.php" method="POST">
            <h1 class="h1">Registreer</h1>
            <label class="label" for="username">Username</label><br>
            <input class="input" type="text" name="username" id="username" placeholder="Enter username" required><br>
            <label class="label" for="email">Email</label><br>
            <input class="input" type="email" name="email" id="email" placeholder="Enter email" required><br>
            <label class="label" for="password">Password</label><br>
            <input class="input" type="password" name="wachtwoord" id="wachtwoord" placeholder="Enter password" required><br>
            <button class="button">Registreer</button>
            <p class="p">Al een account? Ga naar de login pagina <a href="login.php">hier</a></p>
        </form>
    </div>
</body>

</html>