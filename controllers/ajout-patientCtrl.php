<?php
if (isset($_POST['lastname'],$_POST['firstname'],$_POST['birthdate'],$_POST['phone'],$_POST['mail'])) {
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $birthdate = htmlspecialchars($_POST['birthdate']);
    $phone = htmlspecialchars($_POST['phone']);
    $mail = htmlspecialchars($_POST['mail']);
if ($_POST['lastname'] == '') {
    $message = 'Merci de remplir le champs "Nom"';
}elseif ($_POST['firstname'] == '') {
    $message = 'Merci de remplir le champs "Prénom"';
}elseif ($_POST['birthdate'] == '') {
    $message = 'Merci de remplir le champs "Date de naissance"';
}elseif (!preg_match('/^[1-2][019]\d{2}-[01][1-9]-[0-3][0-9]$/',$_POST['birthdate'])) {
    $message = 'Merci d\'entré une date valide';
}elseif ($_POST['phone'] == '') {
    $message = 'Merci de remplir le champs "téléphonne"';
}elseif ($_POST['mail'] == '') {
    $message = 'Merci de remplir le champs "Email"';
}elseif (!preg_match('/[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/',$_POST['mail'])) {
    $message = 'Merci de verifier l\'adresse email';
} elseif (is_string($_POST['lastname']) && is_string($_POST['firstname']) && is_string($_POST['birthdate']) && is_numeric($_POST['phone']) && is_string($_POST['mail']) ){
        $patient = new Patient;
        $patient->createPatient($lastname, $firstname,$birthdate,$phone,$mail);
        $message = 'Formulaire envoyer !';
}else{
    $message = 'Les données entrés sont incorrects';
}}