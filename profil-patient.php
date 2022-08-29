<?php
require 'models/Db.php';
require 'models/Patient.php';
require 'controllers/liste-patientsCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Hopital - Ajout Patient</title>
</head>

<body>
    <header>
        <nav>
            <li>
                <ul> <a href="index.php">Acceuil</a></ul>
                <ul> <a href="ajout-patient.php">Ajouter un patient</a></ul>
                <ul> <a href="ajout-rendez-vous.php">Ajouter un rendez-vous</a></ul>
                <ul><a href="ajout-patient-rendez-vous.php">Ajouter un patient et un rendez-vous</a></ul>
            </li>
        </nav>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Téléphonne</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($patientList as $patient) { ?>
                    <tr>
                        <td class="border"><?= $patient->lastname ?></td>
                        <td class="border"><?= $patient->firstname ?></td>
                        <td class="border"><?= $patient->birthdate ?></td>
                        <td class="border"><?= $patient->phone ?></td>
                        <td class="border"><?= $patient->mail ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>