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
}
