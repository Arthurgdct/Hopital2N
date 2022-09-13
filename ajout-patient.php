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
    <title>Hopital - Ajout patient</title>
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
            <h1>Ajout de Patient</h1>
        </nav>
    </header>
    <main>
        <section>
            <form class="addPatientForm" method="post">

                <label for="lastname">Nom du patient:</label>
                <input type="text" id="lastname" name="lastname" value="<?php if (isset($_POST['lastname'])) {
                                                                            echo $_POST['lastname'];
                                                                        } ?>">
                <p class="textRed"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></p>

                <label for="firstname">Prénom du patient:</label>
                <input type="text" id="firstname" name="firstname" value="<?php if (isset($_POST['firstname'])) {
                                                                                echo $_POST['firstname'];
                                                                            } ?>">
                <p class="textRed"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></p>

                <label for="birthdate">Date de naissance:</label>
                <input type="date" id="birthdate" name="birthdate" value="<?php if (isset($_POST['birthdate'])) {
                                                                                echo $_POST['birthdate'];
                                                                            } ?>">
                <p class="textRed"><?= isset($errors['birthdate']) ? $errors['birthdate'] : '' ?></p>

                <label for="phone">Numéro de téléphone:</label>
                <input type="phone" id="phone" name="phone" value="<?php if (isset($_POST['phone'])) {
                                                                        echo $_POST['phone'];
                                                                    } ?>">
                <p class="textRed"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></p>

                <label for="mail">Email :</label>
                <input type="email" id="email" name="mail" value="<?php if (isset($_POST['mail'])) {
                                                                        echo $_POST['mail'];
                                                                    } ?>">
                <p class="textRed"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></p>
                <?php
                if (isset($message)) { ?>
                    <p><?= $message ?></p><?php } ?>
                <p class="textRed"><?= isset($errors['patientRegister']) ? $errors['patientRegister'] : '' ?></p>
                <input name="validForm" class="buttonPatientForm" type="submit" value="Ajouter le patient">
            </form>
        </section>
    </main>
</body>

</html>