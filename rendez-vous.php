<?php
require 'models/Db.php';
require 'models/Appointment.php';
require 'models/Patient.php';
require 'controllers/rendezvousCtrl.php';

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
    <title>Hopital - Rendez-vous</title>
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
            <h1>Rendez-vous</h1>
        </nav>
    </header>
    <main>
        <section>
            <?php
            if (isset($match)) { ?>
                <table class="tablePatient">
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Date et heure du rendez-vous</th>
                            <th>Date de naissance</th>
                            <th>Numéro de téléphone</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border"><?= $appointmentbyid->firstname ?></td>
                            <td class="border"><?= $appointmentbyid->lastname ?></td>
                            <td class="border"><?= isset($succes) ? dateHourFormat($_POST['dateHour'], 'Y-m-d\TH:i', 'd/m/Y H:i') : dateHourFormat($appointmentbyid->dateHour, 'Y-m-d H:i:s', 'd/m/Y H:i') ?></td>
                            <td class="border"><?= dateHourFormat($appointmentbyid->birthdate, 'Y-m-d', 'd/m/Y') ?></td>
                            <td class="border"><?= $appointmentbyid->phone ?></td>
                            <td class="border"><?= $appointmentbyid->mail ?></td>
                        </tr>
                    </tbody>
                </table>
                <a id="modifButton" class="buttonPatientForm" href="rendez-vous.php?id=<?= $appointmentbyid->id ?>&modif=true">Modifier</a>
        </section>
    <?php } else { ?>
        <p class="notfound"> <?= $errors['id']; ?></p>
    <?php }
            if (isset($_GET['modif'])) { ?>
        <form class="addPatientForm" method="post">
            <input type="hidden" name="appointmentId" value="<?= $appointmentbyid->id ?>">
            <select name="patientId">
                <?php foreach ($patientList as $patient) {
                ?><option <?= $patient->id == $appointmentbyid->idPatients ? "selected=\"selected\"" : "" ?> value="<?= $patient->id ?>"><?= $patient->lastname ?> <?= $patient->firstname ?> <?= $patient->birthdate ?></option>
                <?php } ?></select>
            <p class="textRed"><?= isset($errors['id']) ? $errors['id'] : '' ?></p>
            <label for="dateHour">Date et heure du rendez-vous:</label>
            <input type="datetime-local" id="dateHour" name="dateHour" value="<?= $appointmentbyid->dateHour ?>">
            <p class="textRed"><?= isset($errors['formatDateHour']) ? $errors['formatDateHour'] : '' ?></p>
            <?php if (isset($succes)) { ?>
                <p class="textGreen">Formulaire envoyer avec succès.</p>
            <?php } ?>
            <input name="validForm" class="buttonPatientForm" type="submit" value="Modifier ce rendez-vous">

        </form>
    <?php } ?>


    </main>
</body>

</html>