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
    <title>Hopital - Liste patient</title>
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
            <div class="sreachNav">
                <form action="" method="GET">
                    <input type="text" name="sreach" placeholder="Chercher une patient ...">
                    <input type="submit" value="Ok">
                </form>
            </div>
            <h1>Liste Patients</h1>
        </nav>
    </header>
    <main>

        <table class="tablePatient">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Informations</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($patientList as $patient) { ?>
                    <tr>
                        <td class="border"><?= $patient->lastname ?></td>
                        <td class="border"><?= $patient->firstname ?></td>
                        <td class="border"><a href="profil-patient.php?id=<?= $patient->id ?>">Fiche Patient</a></td>
                        <td class="border"><a href="liste-patients.php?suppr=<?= $patient->id ?>">Supprimez</a> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <ul class="pagination">
            <?php if (isset($_GET['sreach'])) { ?>
            <?php }elseif (!isset($_GET['page']) || $_GET['page'] == 1) { ?>
                <li class="btnPagination">
                    <a href="liste-patients.php" class="disabled"><img src="assets/img/FlechePaginationPrécédente.png" alt="Page Suivante"></a>
                </li>
                <li class="btnPagination">
                    <?= '1' ?>
                </li>
                <li class="btnPagination">
                    <a href="liste-patients.php?page=2"><img src="assets/img/FlechePagination.png" alt="Page Suivante"></a>
                </li>
            <?php } elseif ($matchpage == true) { ?>
                <li class="btnPagination">
                    <a href="liste-patients.php?page=<?= $page ?>"><img src="assets/img/FlechePaginationPrécédente.png" alt="Page Suivante"></a>
                </li>
                <li class="btnPagination">
                    <?= $page + 1 ?>
                </li>
                <li class="btnPagination">
                    <a href="liste-patients.php?page=<?= $page + 2 ?>"><img src="assets/img/FlechePagination.png" alt="Page Suivante"></a>
                </li>
            <?php } ?>
        </ul>
    </main>
</body>

</html>