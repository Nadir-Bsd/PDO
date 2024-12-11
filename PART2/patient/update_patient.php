<?php 

require_once '../../config.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ./profil_patient.php');
    return;
}

if (
    !isset(
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['email'],
        $_POST['phoneNumber'],
        $_POST['birthDate'],
        $_GET['idPatient'],
    )
) {
    header('location: ./profil_patient.php');
    return;
}

if (
    empty($_POST['firstName']) ||
    empty($_POST['lastName']) ||
    empty($_POST['email']) ||
    empty($_POST['phoneNumber']) ||
    empty($_GET['idPatient']) ||
    empty($_POST['birthDate'])
) {
    header('location: ./profil_patient.php');
    return;
}

// input sanitization
$firstName = htmlspecialchars(trim($_POST['firstName']));
$lastName = htmlspecialchars(trim($_POST['lastName']));
$email = htmlspecialchars(trim($_POST['email']));
$phoneNumber = htmlspecialchars(trim($_POST['phoneNumber']));
$birthDate = htmlspecialchars(trim($_POST['birthDate']));
$idPatient = htmlspecialchars(trim($_GET['idPatient']));

$request = "UPDATE patients SET lastname = '{$lastName}', firstname = '{$firstName}', birthdate = '{$birthDate}', phone = '{$phoneNumber}', mail = '{$email}' WHERE id = '{$idPatient}'";


try {
    $resultR = $pdo->query($request);
    header('location: ./profil_patient.php');
} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
};

?>