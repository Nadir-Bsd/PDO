<?php 
    require_once '../../config.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        header('location: ./list_patients.php');
        return;
    };
    
    if (!isset($_GET['idPatient'])) {
        header('location: ./list_patients.php');
        return;
    };

    
    if (empty($_GET['idPatient'])) {
        header('location: ./list_patients.php');
        return;
    };
        
    // input sanitization
    $idPatient = htmlspecialchars(trim($_GET['idPatient']));

    $request = "SELECT * FROM patients WHERE id = '{$idPatient}'";

    $query = $pdo->query($request);
    $patient = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= "<h1>{$patient['lastname']} {$patient['firstname']}</h1>" ?>
            
        <?= "
            <p>birt date : {$patient['birthdate']}</p>
            <p>phone number : {$patient['phone']}</p>
            <p>email : {$patient['mail']}</p>
        "?>

        <form action=<?="./update_patient.php?idPatient={$idPatient}"?> method="post">
            <label>firstName<input type="text" name="firstName" value=<?="{$patient['firstname']}"?>></label>
            <label>lastName<input type="text" name="lastName" value=<?="{$patient['lastname']}"?>></label>
            <label>email<input type="text" name="email" value=<?="{$patient['mail']}"?>></label>
            <label>phoneNumber<input type="text" name="phoneNumber" value=<?="{$patient['phone']}"?>></label>
            <label>birthDate<input type="date" name="birthDate" value=<?="{$patient['birthdate']}"?>></label>
            <input type="submit" value="PRET">
        </form>
</body>
</html>