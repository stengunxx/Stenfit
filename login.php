<?php

session_start();

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $stmt = $pdo->prepare('SELECT * FROM gebruikers WHERE email = :email');
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
        $_SESSION['LoggedInUser'] = $user['id'];
        header('location: index.php');
        exit();
    } else {
        $error = "Verkeerde email/wachtwoord combinatie";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="body1">
    <div class="login">
        <form action="login.php" method="POST">
            <h1 class="h1">Login</h1>
            <label for="email" class="label">Email</label><br>
            <input class="input" type="email" name="email" id="email" placeholder="Enter email" required><br>
            <label for="password" class="label">Password</label><br>
            <input class="input" type="password" name="wachtwoord" id="wachtwoord" placeholder="Enter password" required><br>
            <button class="button">Login</button>
            <p class="p">Nog geen account? Ga naar de registreer pagina <a href="register.php">hier</a></p>
        </form>
    </div>
    <?php if (isset($error)) {
            echo "<h3 class='h3'>$error</h3>";
        } ?>
</body>

</html>
