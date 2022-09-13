<?php
class Appointment extends Db
{
    public int $id;
    public string $dateHour;
    public int $idPatients;
    public array $error;
    //methode pour crée un rendez-vous dans la bdd
    public function createAppointment()
    {
        $query = 'INSERT INTO `appointments` (`dateHour`,`idPatients`) VALUES (:dateHour, :idPatients)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $stmt->bindParam(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getAppointmentsList() : array
    {
        $query = 'SELECT `appointments`.`id`,`dateHour`,`lastname`,`firstname` FROM `appointments` INNER JOIN `patients` WHERE `appointments`.`idPatients` = `patients`.`id`';
        return $this->getQueryResult($query);
    }

    public function getMoreInfoAppointments() : array
    {

        $query = 'SELECT `idPatients`,`dateHour`,`lastname`,`firstname`,`birthdate`,`phone`,`mail` FROM `appointments` INNER JOIN `patients` WHERE `appointments`.`idPatients` = `patients`.`id`';
        return $this->getQueryResult($query);
    }
    public function getIdAndInfo($id):object
    {
        $query = 'SELECT `appointments`.`id`, `idPatients`,`dateHour`,`lastname`,`firstname`,`birthdate`,`phone`,`mail` FROM `appointments` INNER JOIN `patients` WHERE `appointments`.`idPatients` = `patients`.`id` AND :id = `appointments`.`id`';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function idExist($id): bool
    {
        $query = 'SELECT COUNT(*) AS `number` FROM `appointments` WHERE `id`= :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result->number;
    }

    public function updateAppointment()
    {
        $query = 'UPDATE `appointments` SET `dateHour` = :dateHour, `idPatients` = :idPatients WHERE `id` = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idPatients',$this->idPatients,pdo::PARAM_INT);
        $stmt->bindParam(':id',$this->id,PDO::PARAM_INT);
        $stmt->bindParam(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getAppointmentsTime($id) : array
    {
        $query = 'SELECT `dateHour` FROM `appointments` WHERE `appointments`.`idPatients` = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchall(PDO::FETCH_OBJ);
    }

    public function SupprAppointment($id)
    {
        $query = 'DELETE FROM `appointments` WHERE `id` = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
    }
}
