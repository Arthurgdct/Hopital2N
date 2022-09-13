<?php
$patient = new Patient;
$patientList = $patient->getPatientListByOrder();

if (isset($_GET['suppr'])) {
    $idPatientSuppr = htmlspecialchars($_GET['suppr']);
    if (is_numeric($idPatientSuppr)) {
        $patient->SupprAppointmentAndPatient($idPatientSuppr);
        $patientList = $patient->getPatientListByOrder();
    }
}

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
} else {
    $page = 1;
}
if (!empty($page)) {
    if (is_numeric($page)) {
        $matchpage = true;
        $page = $page - 1;
        $offset = $page * 3;
        $patientList = $patient->pagination($offset);
    }
}

if (isset($_GET['sreach'])) {
    $sreach = $_GET['sreach'];
    $patientList = $patient->getPatientSreach($sreach);
}