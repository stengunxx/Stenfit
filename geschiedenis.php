<?php

session_start();

if (!isset($_SESSION['LoggedInUser'])) {
    header('location: login.php');
    exit();
}

require 'db.php';

$stmt = $pdo->prepare("SELECT * FROM aantal WHERE gebruiker_id = :gebruiker_id");
$stmt->execute(['gebruiker_id' => $_SESSION['LoggedInUser']]);
$stmtData = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar">
        <h2>stenfit</h2>
        <div class="nav">
            <form action="index.php">
                <button><img src="./fotos/home.png" alt="">Home</button>
            </form>
            <form action="training.php">
                <button><img src="./fotos/training.png" alt="">training</button>
            </form>
            <form action="voortgang.php">
                <button><img src="./fotos/voortgang.png" alt="">voortgang</button>
            </form>
        </div>
        <form action="logout.php" method="POST">
            <button type="submit" name="submit" id="submit">Logout</button>
        </form>
    </div>
    <div class="geschiedenis">
        <h1>Jouw geschiedenis</h1>
        <h3>
        <?php
        foreach ($stmtData as $geschiedenis) {
            echo '<div class="gesdeel">' . '<img src="./fotos/dumbells.jpg" alt="">' . $geschiedenis['dag'] . ' - week ';
            echo $geschiedenis['week'] . '<br>';
            echo 'getrained - ' . $geschiedenis['getrained'] . '</div>';
        }
        ?>
        </h3>
    </div>
</body>

</html>