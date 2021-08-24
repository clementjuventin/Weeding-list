<?php


class GatewayObjet
{
    private $con;
    public function __construct($c){
        $this->con=$c;
    }
    public function getObjet(){
        $query = 'SELECT * FROM objet;';
        $this->con->executeQuery($query, array());
        $results = $this->con->getResults();

        $liste = array();
        $gatewayParticipant = new GatewayParticipant($this->con);
        foreach ($results as $obj) {
            $liste[] = new Objet($obj[0], $obj[1], $obj[2], $obj[3], $gatewayParticipant->getParticipant($obj[0]));
        }
        return $liste;
    }
    public function updateObjet(int $id, int $number){
        $query = 'UPDATE objet SET lastNumber = lastNumber - :number WHERE id=:id;';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':number' => array($number, PDO::PARAM_INT)));
    }
}