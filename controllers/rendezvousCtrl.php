<?php
$appointment = new Appointment;
$patient = new Patient;
$patientList = $patient->getPatientListByOrder();

function dateHourFormat($date, $formatInput,$formatOuput)
{
    $d = DateTime::createFromFormat($formatInput, $date);
    return $d->format($formatOuput);
}

function validateDate($date, $format)
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    if (!is_numeric($id)) {
        $errors['id'] = 'L\'id renseigner ne respecte pas le format attendu';
    }
    if (empty($errors)) {
        if ($appointment->idExist($id)) {
            $appointmentbyid = $appointment->getIdAndInfo($_GET['id']);
            $match = true;
        } else {
            $errors['id'] = 'Aucun rendez-vous avec cet id n\'existe.';
        }
    }
} else {
    $errors['id'] = 'Aucun id n\'est renseigner';
}
if (isset($_POST['validForm'])) {
    $dateh = htmlspecialchars($_POST['dateHour']);
    if (!validateDate($dateh, 'Y-m-d\TH:i')) {
        $errors['formatDateHour'] = 'Vérifier le format de votre date/heure.';
    }
    if (!$appointment->idExist($_GET['id'])) {
        $errors['id'] = 'Stop toucher mon HTML';
    }

    if (empty($errors)) {
        $appointmentId = htmlspecialchars($_POST['appointmentId']);
        $idPatients = htmlspecialchars($_POST['patientId']);
        $appointment->idPatients = $idPatients;
        $appointment->id = $appointmentId;
        $appointment->dateHour = $dateh;
        $appointment->updateAppointment();
        $succes = true;
        $appointmentbyid = $appointment->getIdAndInfo($_GET['id']);
    }
}