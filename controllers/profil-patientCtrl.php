<?php
$patient = new Patient;
$patientsList = $patient->getPatientsList();
$errors = [];

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    if (!is_numeric($id)) {
        $errors['id'] = 'L\'id renseigner ne respecte pas le format attendu';
    }
    if (empty($errors)) {
        var_dump($patient->idExist($id));
        if ($patient->idExist($id)) {
            $patientbyid = $patient->getId($_GET['id']);
            $match = true;
        } else {
            $errors['id'] = 'Aucun patient avec cet id n\'existe.';
        }
    }
} else {
    $errors['id'] = 'Aucun id n\'est renseigner';
}
