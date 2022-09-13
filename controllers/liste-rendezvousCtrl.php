<?php
$appointment = new Appointment;
$appointmentList = $appointment->getAppointmentsList();
function dateHourFormat($date, $formatInput,$formatOuput)
{
    $d = DateTime::createFromFormat($formatInput, $date);
    return $d->format($formatOuput);
}

if (isset($_GET['suppr'])){
    $supprid = htmlspecialchars($_GET['suppr']);
    if (is_numeric($supprid)) {
        $DeleteAppointment = $appointment->SupprAppointment($supprid);
        $appointmentList = $appointment->getAppointmentsList();
    } 
}