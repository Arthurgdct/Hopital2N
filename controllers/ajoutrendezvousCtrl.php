<?php
$appointment = new Appointment;
$patient = new Patient;
$patientList = $patient->getPatientListByOrder();
$errors = [];
// Function qui verifie le format d'une date tel que envoyer par l'input de type "datetime-local"
function validateDate($date, $format)
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

if (isset($_POST['validForm'])) {
    $dateh = htmlspecialchars($_POST['dateHour']);
    if (!validateDate($dateh, 'Y-m-d\TH:i')) {
        $errors['formatDateHour'] = 'Vérifier le format de votre date/heure.';
    }
    if (!$patient->idExist($_POST['patientInfo'])) {
        $errors['id'] = 'Stop toucher mon HTML';
    }
    if (empty($errors)) {
        $appointment->dateHour = $dateh;
        $appointment->idPatients = $_POST['patientInfo'];
        $appointment->createAppointment();
    }
}
