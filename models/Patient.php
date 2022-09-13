<?php
class Patient extends Db
{
    public int $id;
    public string $lastname;
    public string $firstname;
    public string $birthdate;
    public string $phone;
    public string $mail;
    public array $error;

    // public ?string $lastname = null;
    // public ?string $firstname = null;
    // public ?string $birthdate = null;
    // public ?string $phone = null;
    // public ?string $mail = null;



    /**
     * Méthode qui permet de récupérer la liste complète des clients.
     *
     * @return array
     */
    public function getPatientsList(): array
    {
        /**
         * Création de la requête SQL
         */
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients`';

        return $this->getQueryResult($query);
    }
    /**
     * Méthode qui permet d'envoyer des données d'un patient d'un formulaire pour les inclure dans la base de données.
     *
     * @return array
     */
    public function createPatient()
    {
        // : est un  marqueur nommé et ? est un marqueur interrogatif
        $query = 'INSERT INTO `patients` (`firstname`, `lastname`, `birthdate`, `phone`, `mail`) VALUES 
        (:firstname, :lastname, :birthdate, :phone, :mail)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindParam(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $stmt->bindParam(':mail', $this->mail, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function isPatientExist() :bool
    {
        $query = 'SELECT COUNT(*) AS `number` FROM `patients` WHERE `lastname` = :lastname AND `firstname` = :firstname AND `birthdate` = :birthdate';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindParam(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result->number;
    }

    public function getPatientListByOrder(): array
    {
        $query = 'SELECT `id`, `lastname`,`firstname`,`birthdate`,`phone`,`mail` FROM `patients` ORDER BY `lastname` ASC';
        return $this->getQueryResult($query);
    }

    public function getId($id):object
    {
        $query = 'SELECT `id`,`lastname`,`firstname`,`birthdate`,`phone`,`mail` FROM `patients` WHERE `id` = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function idExist($id): bool
    {
        $query = 'SELECT COUNT(*) AS `number` FROM `patients` WHERE `id`= :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result->number;
    }

    public function updatePatient($id)
    {
        $query = 'UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname,`birthdate` = :birthdate, `phone` = :phone, `mail` = :mail WHERE `id` = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindParam(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $stmt->bindParam(':mail', $this->mail, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function SupprAppointment($idPatientToSuppr)
    {
        $query = 'DELETE FROM `appointments` WHERE `idPatients` = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id',$idPatientToSuppr,PDO::PARAM_INT);
        $stmt->execute();

    }
    public function SupprPatients($idPatientToSuppr)
    {
        $query = 'DELETE FROM `patients` WHERE `id` = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id',$idPatientToSuppr,PDO::PARAM_INT);
        $stmt->execute();
    }

    public function SupprAppointmentAndPatient($idPatientToSuppr)
    {
        $this->SupprAppointment($idPatientToSuppr);
        $this->SupprPatients($idPatientToSuppr);
    }

    public function getPatientSreach($sreach)
    {
        $query = 'SELECT `id`, `lastname`,`firstname`,`birthdate`,`phone`,`mail` FROM `patients` WHERE `lastname` LIKE CONCAT("%", :sreach, "%") OR `firstname` LIKE CONCAT("%", :sreach, "%") ORDER BY `lastname` ASC';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':sreach',$sreach,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function pagination($offset)
    {
        // $query = 'SELECT `id`, `lastname`,`firstname`,`birthdate`,`phone`,`mail` FROM `patients` WHERE `lastname` LIKE CONCAT("%", :sreach, "%") OR `firstname` LIKE CONCAT("%", :sreach, "%") ORDER BY `lastname` ASC LIMIT :idpage - 10, :idpage + 10';
        $query = 'SELECT `id`, `lastname`,`firstname`,`birthdate`,`phone`,`mail` FROM `patients` ORDER BY `lastname` ASC LIMIT :offset, 3';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        //$stmt->bindParam(':sreach', $sreach, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(pdo::FETCH_OBJ);
    }
}