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
    <title>Hopital - Acceuil</title>
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
            <h1>Acceuil</h1>
        </nav>
    </header>
    <main>
        <section id="presentation">
            <img id="imgAcceuil" src="assets/img/Medecinacceuil.png" alt="Bienvenue sur Hopital2N le gestionnaire de patient 2.0">
        </section>
    </main>
</body>

</html>