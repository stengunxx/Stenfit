<?php

session_start();

if (!isset($_SESSION['LoggedInUser'])) {
    header('location: login.php');
    exit();
}
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['workout'])) {
        $workout = $_POST['workout'];
        header('location: oefeningen.php?workout=' . urlencode($workout));
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training</title>
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

    <h1>Training</h1>
    <h2>Op lichaamsdeel</h2>

    <form action="training.php" method="POST">
        <div class="lichaamdeel">
            <button class="deel" type="submit" name="workout" value="armen">
                <img src="./fotos/armen.jpeg" alt=""><br>Armen
            </button>
            <button class="deel" type="submit" name="workout" value="abs">
                <img src="./fotos/abs.jpg" alt=""><br>Abs
            </button>
            <button class="deel" type="submit" name="workout" value="benen">
                <img src="./fotos/benen.jpg" alt=""><br>Benen
            </button>
            <button class="deel" type="submit" name="workout" value="borst">
                <img src="./fotos/borst.jpg" alt=""><br>Borst
            </button>
            <button class="deel" type="submit" name="workout" value="rug">
                <img src="./fotos/rug.jpg" alt=""><br>Rug
            </button>
            <button class="deel" type="submit" name="workout" value="schouders">
                <img src="./fotos/schouders.jpg" alt=""><br>Schouders
            </button>
        </div>
    </form>
</body>

</html>