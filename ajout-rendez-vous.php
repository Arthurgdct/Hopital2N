<?php

declare(strict_types=1);
require 'models/Db.php';
require 'models/Patient.php';
require 'models/Appointment.php';
require 'controllers/ajoutrendezvousCtrl.php';
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
    <title>Hopital - Ajout de rendez-vous</title>
</head>

<body>
    <header>
    <nav class="navBar">
            <a class="buttonNav" href="index.php">Acceuil</a>
            <div class="dropDown">
                <button class="buttonNavDrop">Patients</button>
                <div class="dropDownChild">
                    <a class="navLink" href="ajout-patient.php">Ajouter un patient</a>
                    <a class="navLink" href="liste-patients.php">Consulter la liste des patients</a>
                    <a class="navLink" href="ajout-patient-rendez-vous.php">Ajouter un patient et un rendez-vous</a>
                </div>
            </div>
            <div class="dropDown">
                <button class="buttonNavDrop">Rendez-vous</button>
                <div class="dropDownChild">
                    <a class="navLink" href="ajout-rendez-vous.php">Ajouter un rendez-vous</a>
                    <a class="navLink" href="liste-rendez-vous.php">Consulter la liste des rendez-vous</a>
                    <a class="navLink" href="ajout-patient-rendez-vous.php">Ajouter un patient et un rendez-vous</a>
                </div>
            </div>
            <h1>Ajout rendez-vous</h1>
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


            <input name="validForm" class="buttonPatientForm" type="submit" value="Ajouter le rendez-vous">
        </form>
    </main>
</body>

</html>