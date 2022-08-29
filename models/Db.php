<?php

class Db {
    protected PDO $pdo;

    /**
     * Permet la connexion à la BDD
     */
    public function __construct()
    {
        try {
            /** @var PDO $pdo  
             * Instance de l'objet PDO
             */
            $this->pdo = new PDO('mysql:host=localhost;dbname=hospitale2n;charset=utf8', 'root');
            /**
             * PDO::ATTR_ERRMODE et PDO::ERRMODE_EXCEPTION permettent de spécifier à PDO que l'on veux des Exceptions à la place des erreurs PHP. Cela va permettre de les attraper dans le catch.
             */
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            die('Erreur : ' . $error->getMessage());
        }
    }

    /**
     * Cette methode est protected. Elle ne peut être appelé que dans la classe et ses enfants. Elle permet d'executer la requête SQL et de retourner le jeu de résultats.
     *
     * @param [type] $query
     * @return array
     */
    protected function getQueryResult($query): array
    {
        /**
         * $queryResult devient une instance de l'objet PCOStatement
         * $pdo->query() execute la requête SQL
         */
        $queryResult = $this->pdo->query($query);
        /**
         * Le fetchAll permet de récupérer un tableau avec les valeurs de la BDD
         * Le paramètre PDO::FETCH_OBJ permet de spécifier que le tableau de retour doit contenir un objet avec des attributs correspondant aux champs de la BDD.
         */
        $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    protected function postFormResult($query)
    {
        //préparation de la commande sql et sécurisation des données.
        $stmt = $this->pdo->prepare('INSERT INTO `patients`(lastname, firstname, birthdate, phone, mail) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)');
        if (isset($_POST['lastname'],$_POST['firstname'],$_POST['birthdate'],$_POST['phone'],$_POST['mail'])) {
            $lastname = htmlspecialchars($_POST['lastname']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $birthdate = htmlspecialchars($_POST['birthdate']);
            $phone = htmlspecialchars($_POST['phone']);
            $mail = htmlspecialchars($_POST['mail']);
        }
        //execution des données préparés
        $stmt->execute(array(
            'lastname'=>$lastname,
            'firstname'=>$firstname,
            'birthdate'=>$birthdate,
            'phone'=>$phone,
            'mail'=>$mail
        ));
    }
}