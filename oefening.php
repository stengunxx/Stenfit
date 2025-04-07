<?php
session_start();

if (!isset($_SESSION['LoggedInUser'])) {
    header('location: login.php');
    exit();
}

require 'db.php';

if (isset($_GET['workout'])) {
    $selected_workout = $_GET['workout'];
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM oefeningen WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $stmtData = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Details</title>
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

    <div class="beschrijving">
        <h1><?php echo htmlspecialchars($stmtData['oefening']); ?></h1>
        <h3><?php echo htmlspecialchars($stmtData['beschrijving']); ?></h3>

        <?php
        $videoUrl = $stmtData['filmpje'];
        if (strpos($videoUrl, 'youtube.com/watch?v=') !== false) {
            $videoUrl = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $videoUrl);
        }
        ?>

        <iframe width="560" height="315" src="<?php echo htmlspecialchars($videoUrl); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</body>

</html>
