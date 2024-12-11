<?php 

require_once '../../config.php';

$request = "SELECT * FROM patients";
try {
    $resultR = $pdo->query($request);
    $patients = $resultR->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat
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

    foreach ($patients as $patient) {
        echo 
        "
            <p>Prenom : {$patient['firstname']}</p>
            <p>Nom : {$patient['lastname']}</p>
            <p>birt date : {$patient['birthdate']}</p>
            <p>phone number : {$patient['phone']}</p>
            <p>email : {$patient['mail']}</p>
            <a href='./profil_patient.php?idPatient={$patient['id']}'>VOIR PATIENT</a>
            <br/>
            <br/>
        ";
    };
    ?>
    <a href="./ajout_patient.php">AJOUTER UN PATIENTS</a>
</body>
</html>