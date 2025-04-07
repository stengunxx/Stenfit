<?php
session_start();

if (!isset($_SESSION['LoggedInUser'])) {
    header('location: login.php');
    exit();
}

require 'db.php';

if (isset($_GET['workout'])) {
    $selected_workout = $_GET['workout'];
}

$stmt = $pdo->prepare("SELECT * FROM oefeningen WHERE spiergroep = :selected_workout");
$stmt->bindParam(':selected_workout', $selected_workout, PDO::PARAM_STR);
$stmt->execute();
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
                <button><img src="./fotos/training.png" alt="">Training</button>
            </form>
            <form action="voortgang.php">
                <button><img src="./fotos/voortgang.png" alt="">Voortgang</button>
            </form>
        </div>
        <form action="logout.php" method="POST">
            <button type="submit" name="submit" id="submit">Logout</button>
        </form>
    </div>

    <h1 class="h1midden"><?php echo htmlspecialchars($selected_workout); ?></h1>

    <form action="oefening.php" method="GET">
        <input type="hidden" name="workout" value="<?php echo htmlspecialchars($selected_workout); ?>">

        <div class="lichaamdeel">
            <?php
            if ($stmtData) {
                foreach ($stmtData as $oefening) {
                    echo '<button class="deel" type="submit" name="id" value="' . htmlspecialchars($oefening['id']) . '">';
                    echo '<img src="' . htmlspecialchars($oefening['foto']) . '" alt=""><br>' . htmlspecialchars($oefening['oefening']);
                    echo '</button>';
                }
            }
            ?>
        </div>
    </form>
</body>

</html>
