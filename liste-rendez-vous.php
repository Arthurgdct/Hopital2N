<?php
require 'models/Db.php';
require 'models/Appointment.php';
require 'controllers/liste-rendezvousCtrl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Hopital - Liste rendez-vous</title>
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
            <h1>Liste rendez-vous</h1>
        </nav>
    </header>
    <main>

        <table class="tablePatient">
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Date et heure du rendez-vous</th>
                    <th>Informations Supplémentaires</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointmentList as $appointment) { ?>
                    <tr>
                        <td class="border"><?= $appointment->firstname ?></td>
                        <td class="border"><?= $appointment->lastname ?></td>
                        <td class="border"><?= dateHourFormat($appointment->dateHour, 'Y-m-d H:i:s', 'd/m/Y H:i') ?></td>
                        <td class="border"><a href="rendez-vous.php?id=<?= $appointment->id ?>">En savoir plus</a></td>
                        <td class="border"><a href="liste-rendez-vous.php?suppr=<?= $appointment->id ?>">Supprimez</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php if (empty($appointmentList)) { ?>
            <p class="notfound">Vacances ou chômage Inc</p>
        <?php } ?>
    </main>
</body>

</html>