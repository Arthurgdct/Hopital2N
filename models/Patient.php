<?php
class Patient extends Db
{
    public int $id;
    public string $lastName;
    public string $firstName;
    public string $birthDate;
    public bool $card;
    public int $cardNumber;
    /**
     * Fonction pour créé un patient, qui créé la requete la prépare et retourne le résultat.
     *
     * @param [string] $lastname
     * @param [string] $firstname
     * @param [string] $birthdate
     * @param [int] $phone
     * @param [string] $mail
     * @return void
     */
    public function createPatient(string $lastname, string $firstname, string $birthdate, int $phone, string $mail)
    {
        $query = "INSERT INTO `patients`(lastname, firstname, birthdate, phone, mail) VALUES ($lastname, $firstname, $birthdate, $phone, $mail)";
        $this->postFormResult($query);
    }

    public function getPatientList(): array
    {
        $query = 'SELECT `lastname`,`firstname`,`birthdate`,`phone`,`mail` FROM `patients`';
        return $this->getQueryResult($query);
    }
}
