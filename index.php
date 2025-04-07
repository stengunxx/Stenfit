<?php
session_start();

if (!isset($_SESSION['LoggedInUser'])) {
    header('location: login.php');
    exit();
}

require 'db.php';

$start_datum = strtotime('monday this week');
$week_dagen = [];

for ($i = 0; $i <= 6; $i++) {
    $dag_datum = strtotime("+$i days", $start_datum);
    $week_dagen[] = date('j', $dag_datum);
}

$dag = date('l');

$dagen = [
    'Monday' => 'maandag',
    'Tuesday' => 'dinsdag',
    'Wednesday' => 'woensdag',
    'Thursday' => 'donderdag',
    'Friday' => 'vrijdag',
    'Saturday' => 'zaterdag',
    'Sunday' => 'zondag',
];

$button_colors = array_fill_keys($dagen, 'white');

if (isset($dagen[$dag])) {
    $button_colors[$dagen[$dag]] = 'rgb(225, 97, 251)';
}

$stmt = $pdo->prepare("SELECT * FROM gebruikers WHERE id = :id");
$stmt->execute(['id' => $_SESSION['LoggedInUser']]);
$stmtData = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <h1>Welkom terug <?php echo $stmtData['username'] ?></h1>
    <div class="hoofd">
        <div class="week">
            <div class="bezoeken">
                <h3>jouw week</h3>
                <a href="Voortgang.php" class="a">Bezoeken bekijken</a>
            </div>
            <form action="getrained.php" method="POST">
                <div class="dag">
                    <?php
                    foreach ($dagen as $dag_en => $dag_nl) {
                        $index = array_search($dag_nl, $week_dagen);
                        echo "<button type='submit' value='$dag_nl' name='dag' id='$dag_nl' class='dagen' style='background-color: {$button_colors[$dag_nl]};'>{$week_dagen[$index]}<br>" . substr($dag_nl, 0, 2) . "</button>";
                    }
                    ?>
                </div>
            </form>
        </div>
        <div class="reclame">
            <?php
            $apiKey = 'cd422b5c325b44bc804bb888a74dce32';
            $apiUrl = 'https://newsapi.org/v2/top-headlines?country=us&category=sports&apiKey=' . $apiKey;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'User-Agent: YourAppName/1.0'
            ));

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Curl error: ' . curl_error($ch);
            } else {
                $newsData = json_decode($response, true);

                if (isset($newsData['articles'])) {
                    echo "<h1>Top Headline News</h1>";
                    foreach ($newsData['articles'] as $article) {
                        echo "<h2>" . htmlspecialchars($article['title']) . "</h2>";
                        echo "<p>" . htmlspecialchars($article['description']) . "</p>";
                        echo "<a href='" . htmlspecialchars($article['url']) . "' target='_blank'>Lees meer</a><br><br>";
                    }
                } else {
                    echo "Geen nieuws beschikbaar.";
                }
            }
            curl_close($ch);
            ?>
        </div>
    </div>
</body>

</html>