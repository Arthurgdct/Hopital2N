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
    <title>Hopital - Liste Patient</title>
</head>

<body>
    <header>
        <nav>
            <ul id="Navbar">
                <li><a class="navButton" href="index.php">Acceuil</a></li>
                <li><a class="navButton" href="ajout-patient.php">Ajouter un patient</a></li>
                <li><a class="navButton" href="ajout-rendez-vous.php">Ajouter un rendez-vous</a></li>
                <li><a class="navButton" href="ajout-patient-rendez-vous.php">Ajouter un patient et un rendez-vous</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <table class="tablePatient">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Informations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                ;
                foreach ($patientList as $patient) { ?>
                    <tr>
                        <td class="border"><?= $patient->lastname ?></td>
                        <td class="border"><?= $patient->firstname ?></td>
                        <td class="border"><a href="profil-patient.php?id=<?= $patient->id ?>">Fiche Patient</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>