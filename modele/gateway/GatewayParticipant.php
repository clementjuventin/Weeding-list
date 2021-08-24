<?php


class GatewayParticipant
{
    private $con;
    public function __construct($c){
        $this->con=$c;
    }
    public function insert(string $name, int $objetId, int $participationNumber){
        $query = 'INSERT INTO participant (pseudo, objetId, participationNumber) VALUES (:name, :objetId, :participationNumber)';
        $this->con->executeQuery($query, array(
            ':name' => array($name, PDO::PARAM_STR),
            ':objetId' => array($objetId, PDO::PARAM_INT),
            ':participationNumber' => array($participationNumber, PDO::PARAM_INT)));
    }
    public function getParticipant($id){
        $query = 'SELECT * FROM participant WHERE objetId=:id;';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
        $results = $this->con->getResults();
        $liste = array();
        foreach ($results as $obj) {
            $liste[] = new Participant($obj[1], $obj[3]);
        }
        return $liste;
    }
}