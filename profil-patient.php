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
                <li><a class="navButton" href="rendez-vous.php">Ajouter un rendez-vous</a></li>
                <li><a class="navButton" href="ajout-patient-rendez-vous.php">Ajouter un patient et un rendez-vous</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div>
            <?php if (isset($match)) { ?>
                <table class="tablePatient">
                    <thead>
                        <tr>
                            <th>Id Patient</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border"><?= $patientbyid->id ?></td>
                            <td class="border"><?= isset($_POST['lastname']) ? $_POST['lastname'] : $patientbyid->lastname ?></td>
                            <td class="border"><?= isset($_POST['firstname']) ? $_POST['firstname'] : $patientbyid->firstname ?></td>
                            <td class="border"><?= isset($_POST['birthdate']) ? $_POST['birthdate'] : $patientbyid->birthdate ?></td>
                            <td class="border"><?= isset($_POST['phone']) ? $_POST['phone'] : $patientbyid->phone?></td>
                            <td class="border"><?= isset($_POST['mail']) ? $_POST['mail'] : $patientbyid->mail ?></td>
                        </tr>
                    </tbody>
                </table>
                <a id="modifButton" class="buttonPatientForm" href="profil-patient.php?id=<?= $patientbyid->id ?>&modif=<?= true ?>">Modifier</a>
        </div>
        <?php if (isset($_GET['modif'])) { ?>
            <form class="addPatientForm" method="post">
                <label for="lastname">Nom du patient:</label>
                <input type="text" id="lastname" name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : $patientbyid->lastname ?>">
                <p class="textRed"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></p>

                <label for="firstname">Prénom du patient:</label>
                <input type="text" id="firstname" name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : $patientbyid->firstname ?>">
                <p class="textRed"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></p>

                <label for="birthdate">Date de naissance:</label>
                <input type="date" id="birthdate" name="birthdate" value="<?= isset($_POST['birthdate']) ? $_POST['birthdate'] : $patientbyid->birthdate  ?>">
                <p class="textRed"><?= isset($errors['birthdate']) ? $errors['birthdate'] : '' ?></p>

                <label for="phone">Numéro de téléphone:</label>
                <input type="phone" id="phone" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : $patientbyid->phone ?>">
                <p class="textRed"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></p>

                <label for="mail">Email :</label>
                <input type="email" id="email" name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : $patientbyid->mail ?>">
                <p class="textRed"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></p>
                <?php
                    if (isset($message)) { ?>
                    <p><?= $message ?></p><?php } ?>
                <p class="textRed"><?= isset($errors['patientRegister']) ? $errors['patientRegister'] : '' ?></p>
                <input name="validForm" class="buttonPatientForm" type="submit" value="Modifier le patient">
            </form>
        <?php }
            } else { ?>
        <?= $errors['id'] ?>
    <?php } ?>
    </main>
</body>

</html>