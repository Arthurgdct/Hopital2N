<?php
require 'models/Db.php';
require 'models/Patient.php';
require 'controllers/profil-patientCtrl.php';
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
            <ul id="Navbar">
                <li><a class="navButton" href="index.php">Acceuil</a></li>
                <li><a class="navButton" href="ajout-patient.php">Ajouter un patient</a></li>
                <li><a class="navButton" href="ajout-rendez-vous.php">Ajouter un rendez-vous</a></li>
                <li><a class="navButton" href="ajout-patient-rendez-vous.php">Ajouter un patient et un rendez-vous</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php if (isset($match)) { ?>
            <table class="tablePatient">
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
                    <tr>
                    <?php var_dump(!$patient->getId($id)) ?>
                        <td class="border"><?= $patientbyid->lastname ?></td>
                        <td class="border"><?= $patientbyid->firstname ?></td>
                        <td class="border"><?= $patientbyid->birthdate ?></td>
                        <td class="border"><?= $patientbyid->phone ?></td>
                        <td class="border"><?= $patientbyid->mail ?></td>
                    </tr>
                </tbody>
            </table>
        <?php }else{ ?>
            <?= $errors['id'] ?>
       <?php } ?>
    </main>
</body>

</html>