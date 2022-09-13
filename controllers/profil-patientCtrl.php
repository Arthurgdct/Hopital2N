<?php
$regexLetter = "/^[a-zâêîôûäëïöüàèìòùé]{1,50}$/i";
$regexPhone = "/^0[1-79][0-9]{8}$/";
$patient = new Patient;
$patientsList = $patient->getPatientsList();
$errors = [];
$appointment = new Appointment;
$appointmentInfo = $appointment->getAppointmentsTime($_GET['id']);

function dateHourFormat($date, $formatInput,$formatOuput)
{
    $d = DateTime::createFromFormat($formatInput, $date);
    return $d->format($formatOuput);
}

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    if (!is_numeric($id)) {
        $errors['id'] = 'L\'id renseigner ne respecte pas le format attendu';
    }
    if (empty($errors)) {
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

//on vérifie que le formulaire a bien été soumis
if (isset($_POST['validForm'])) {
    if (!empty($_POST['firstname'])) {
        if (strlen($_POST['firstname']) <= 50) {
            if (preg_match($regexLetter, $_POST['firstname'])) {
                $patient->firstname = htmlspecialchars($_POST['firstname']);
            } else {
                $errors['firstname'] = 'Le champ Prénom ne doit comporter que des lettres minuscules et majuscules.';
            }
        } else {
            $errors['firstname'] = 'Le champ Prénom doit comporter au maximum 50 caractères.';
        }
    } else {
        $errors['firstname'] = 'Le champ Prénom doit être rempli.';
    }
    if (!empty($_POST['lastname'])) {
        if (strlen($_POST['lastname']) <= 50) {
            if (preg_match($regexLetter, $_POST['lastname'])) {
                $patient->lastname = htmlspecialchars($_POST['lastname']);
            } else {
                $errors['lastname'] = 'Le champ Nom ne doit comporter que des lettres minuscules et majuscules.';
            }
        } else {
            $errors['lastname'] = 'Le champ Nom doit comporter au maximum 50 caractères.';
        }
    } else {
        $errors['lastname'] = 'Le champ Nom doit être rempli.';
    }

    if (!empty($_POST['birthdate'])) {
        $birthdate = $_POST['birthdate'];
        $checkBirthdate = explode('-', $birthdate);
        if (count($checkBirthdate) === 3 && checkdate($checkBirthdate[1], $checkBirthdate[2], $checkBirthdate[0])) {
            $patient->birthdate = htmlspecialchars($_POST['birthdate']);
        } else {
            $errors['birthdate'] = 'Le champ Date de naissance doit être une date valide.';
        }
    } else {
        $errors['birthdate'] = 'Le champ Date de naissance doit être rempli.';
    }
    if (!empty($_POST['phone'])) {
        if (preg_match($regexPhone, $_POST['phone'])) {
            $patient->phone = htmlspecialchars($_POST['phone']);
        } else {
            $errors['phone'] = 'Le champ Téléphone doit respecter le modèle affiché.';
        }
    } else {
        $errors['phone'] = 'Le champ Téléphone doit être rempli.';
    }
    if (!empty($_POST['mail'])) {
        if (filter_var(($_POST['mail']), FILTER_VALIDATE_EMAIL)) {
            $patient->mail = htmlspecialchars($_POST['mail']);
        } else {
            $errors['mail'] = 'Le champ Email ne respecte par les caractèristiques d\'un mail.';
        }
    } else {
        $errors['mail'] = 'Le champ Email doit être rempli.';
    }
    if (empty($errors)) {
        $patient->updatePatient($id);
    }
}
