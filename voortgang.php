<?php

session_start();

if (!isset($_SESSION['LoggedInUser'])) {
    header('location: login.php');
    exit();
}

require 'db.php';

$query = 'SELECT COUNT(*) as totaal FROM `aantal` WHERE gebruiker_id = ?';
$stmt = $pdo->prepare($query);
$stmt -> bindparam(1, $_SESSION['LoggedInUser']);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$weekQuery = 'SELECT COUNT(*) as totaal FROM `aantal` WHERE gebruiker_id = ? AND week = ?';
$stmtWeek = $pdo->prepare($weekQuery);
$stmtWeek->execute([$_SESSION['LoggedInUser'], (new DateTime())->format('W')]);
$week = $stmtWeek->fetch(PDO::FETCH_ASSOC);

$aantal = isset($result['totaal']) ? $result['totaal'] : 0;

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
    <h1>Voortgang</h1>
    <div class="week">
        <div class="bezoeken">
            <h3>Bezoeken</h3>
            <a href="geschiedenis.php" class="a">Geschiedenis bekijken</a>
        </div>
        <div class="dag">
            <div class="aantal">
                <h3>Deze week</h3>
                <h3><?= $week['totaal'] ?><br>bezoeken</h3>
            </div>
            <div class="aantal">
                <h3>Totaal</h3>
                <h3><?php echo $aantal; ?><br>bezoeken</h3>
            </div>
        </div>
    </div>
</body>

</html> 