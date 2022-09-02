<?php

declare(strict_types=1);
require 'models/Db.php';
require 'models/Patient.php';
require 'models/Appointment.php';
require 'controllers/rendezvousCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Hopital - Acceuil</title>
</head>

<body>
    <header>
        <nav>
            <ul id="Navbar">
                <li><a class="navButton" href="index.php">Acceuil</a></li>
                <li><a class="navButton" href="ajout-patient.php">Ajouter un patient</a></li>
                <li><a class="navButton" href="liste-patients.php">Consulter la liste des patients</a></li>
                <li><a class="navButton" href="ajout-patient-rendez-vous.php">Ajouter un patient et un rendez-vous</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form class="addPatientForm" method="post">
            <label for="patientInfo">Choix du patient:</label>
            <select name="patientInfo">
                <?php foreach ($patientList as $patient) {
                ?><option value="<?= $patient->id ?>"><?= $patient->lastname ?> <?= $patient->firstname ?> <?= $patient->birthdate ?></option>
                <?php } ?></select>
            <p class="textRed"><?= isset($errors['id']) ? $errors['id'] : '' ?></p>
            <label for="dateHour">Date et heure du rendez-vous:</label>
            <input type="datetime-local" id="dateHour" name="dateHour">
            <p class="textRed"><?= isset($errors['formatDateHour']) ? $errors['formatDateHour'] : '' ?></p>


            <input name="validForm" class="buttonPatientForm" type="submit" value="Ajouter le patient">
        </form>
    </main>
</body>

</html>