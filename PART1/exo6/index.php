<?php
require_once '../../config.php';

$request = "SELECT * FROM `shows`";

try {
    $resultR = $pdo->query($request);
    $shows = $resultR->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat
} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        foreach ($shows as $show) {
            echo "<p>{$show['title']} par {$show['performer']}, le {$show['date']} à {$show['startTime']}</p><br/>";
        };
    ?>
</body>
</html>