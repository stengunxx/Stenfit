<?php
session_start();

if (!isset($_SESSION['LoggedInUser'])) {
    header('location: login.php');
    exit();
}

require 'db.php';

$dagen = ['maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag', 'zondag'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dag'])) {
    $dag = $_POST['dag'];

    if (in_array($dag, $dagen)) {
        if (isset($_POST['submit'])) {
            $getrained = $_POST['getrained'];
            $stmt = $pdo->prepare('INSERT INTO `aantal` (dag, week, gebruiker_id, getrained) VALUES (?, ?, ?, ?)');
            $stmt->execute([$dag, (new DateTime())->format('W'), $_SESSION['LoggedInUser'], $getrained]);
            header('location: index.php');
            exit();
        }
    }
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
    <div class="bodygetrained">
        <div class="getrained">
            <form action="getrained.php" method="POST">
                <h1><?php echo $dag; ?></h1>
                <label for="getrained">Wat heb je getrained/ga je trainen</label><br>
                <select name="getrained" id="getrained">
                    <option value="armen" name="getrained" id="armen">armen</option>
                    <option value="abs" name="getrained" id="abs">abs</option>
                    <option value="benen" name="getrained" id="benen">benen</option>
                    <option value="borst" name="getrained" id="borst">borst</option>
                    <option value="rug" name="getrained" id="rug">rug</option>
                    <option value="schouders" name="getrained" id="schouders">schouders</option>
                </select><br>
                <input type="hidden" name="dag" value="<?php echo htmlspecialchars($_POST['dag']); ?>">
                <button type="submit" name="submit">Bevestig Dag</button>
            </form>
        </div>
    </div>
</body>

</html>