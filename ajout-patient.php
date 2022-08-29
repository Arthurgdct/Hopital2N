<?php
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
            <li id="Navbar">
                <ul> <a href="index.php">Acceuil</a></ul>
                <ul><a href="liste-patients.php">Consulter la liste des patients</a></ul>
                <ul> <a href="ajout-rendez-vous.php">Ajouter un rendez-vous</a></ul>
                <ul><a href="ajout-patient-rendez-vous.php">Ajouter un patient et un rendez-vous</a></ul>
            </li>
        </nav>
    </header>
    <main>
        <section>
            <form id="addPatientForm" method="post">
                <label for="lastname">Nom du patient:</label>
                <input type="text" id="lastname" name="lastname" value="<?php if (isset($_POST['lastname'])){ echo $_POST['lastname'];}?>">
                <label for="firstname">Prénom du patient:</label>
                <input type="text" id="firstname" name="firstname">
                <label for="birthdate">Date de naissance:</label>
                <input type="date" id="birthdate" name="birthdate">
                <label for="phone">Numéro de téléphone:</label>
                <input type="phone" id="phone" name="phone">
                <label for="mail">Email :</label>
                <input type="email" id="email" name="mail">
                <?php
                if (isset($message)) {
                ?><p><?= $message ?></p><?php
                                    } ?>
                <input id="buttonPatientForm" type="submit" value="Envoyer">
            </form>
        </section>
    </main>
</body>

</html>