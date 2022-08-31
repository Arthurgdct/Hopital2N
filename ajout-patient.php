<?php
declare(strict_types=1);
require 'models/Db.php';
require 'models/Patient.php';
require 'controllers/ajout-patientCtrl.php';
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
                <li><a class="navButton" href="liste-patients.php">Consulter la liste des patients</a></li>
                <li><a class="navButton" href="ajout-rendez-vous.php">Ajouter un rendez-vous</a></li>
                <li><a class="navButton" href="ajout-patient-rendez-vous.php">Ajouter un patient et un rendez-vous</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <form id="addPatientForm" method="post">

                <label for="lastname">Nom du patient:</label>
                <input type="text" id="lastname" name="lastname" value="<?php if (isset($_POST['lastname'])) { echo $_POST['lastname'];} ?>">
                <p class="textRed"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></p>

                <label for="firstname">Prénom du patient:</label>
                <input type="text" id="firstname" name="firstname" value="<?php if (isset($_POST['firstname'])) { echo $_POST['firstname'];} ?>">
                <p class="textRed"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></p>

                <label for="birthdate">Date de naissance:</label>
                <input type="date" id="birthdate" name="birthdate" value="<?php if (isset($_POST['birthdate'])) { echo $_POST['birthdate'];} ?>">
                <p class="textRed"><?= isset($errors['birthdate']) ? $errors['birthdate'] : '' ?></p>

                <label for="phone">Numéro de téléphone:</label>
                <input type="phone" id="phone" name="phone" value="<?php if (isset($_POST['phone'])) { echo $_POST['phone'];} ?>">
                <p class="textRed"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></p>

                <label for="mail">Email :</label>
                <input type="email" id="email" name="mail" value="<?php if (isset($_POST['mail'])) { echo $_POST['mail'];} ?>">
                <p class="textRed"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></p>
                <?php
                if (isset($message)) { ?>
                    <p><?= $message ?></p><?php } ?>
                <p class="textRed"><?= isset($errors['patientRegister']) ? $errors['patientRegister'] : '' ?></p>
                <input name="validForm" id="buttonPatientForm" type="submit" value="Ajouter le patient">
            </form>
        </section>
    </main>
</body>

</html>