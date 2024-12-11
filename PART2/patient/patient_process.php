<?php
require_once '../../config.php';



if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ./ajout_patient.php');
    return;
}

if (
    !isset(
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['email'],
        $_POST['phoneNumber'],
        $_POST['birthDate'],
    )
) {
    header('location: ./ajout_patient.php');
    return;
}

if (
    empty($_POST['firstName']) ||
    empty($_POST['lastName']) ||
    empty($_POST['email']) ||
    empty($_POST['phoneNumber']) ||
    empty($_POST['birthDate'])
) {
    header('location: ./ajout_patient.php');
    return;
}

// input sanitization
$firstName = htmlspecialchars(trim($_POST['firstName']));
$lastName = htmlspecialchars(trim($_POST['lastName']));
$email = htmlspecialchars(trim($_POST['email']));
$phoneNumber = htmlspecialchars(trim($_POST['phoneNumber']));
$birthDate = htmlspecialchars(trim($_POST['birthDate']));


// ajout de patient dans la DB 
$request = "INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES ('{$lastName}', '{$firstName}', '{$birthDate}', '{$phoneNumber}','{$email}')";

try {
    $resultR = $pdo->query($request);
    header('location: ./list_patients.php');
} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
};


?>