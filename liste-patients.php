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
            <li id="Navbar">
                <ul><a href="index.php">Acceuil</a></ul>
                <ul><a href="ajout-patient.php">Ajouter un patient</a></ul>
                <ul><a href="ajout-rendez-vous.php">Ajouter un rendez-vous</a></ul>
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
                    <th>Informations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($patientList as $patient) { ?>
                    <tr>
                        <td class="border"><?= $patient->lastname ?></td>
                        <td class="border"><?= $patient->firstname ?></td>
                        <td><button type="submit" formmethod="get" value="Selectionnez">Selectionnez</button></td>
                    <?php if (isset($_GET['Selectionnez'])) {
                        $patientId = $patient->id;
                        var_dump($patientId);
                    } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>