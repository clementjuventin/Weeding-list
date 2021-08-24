<?php

class ControlerPublic {
    private $con;
    private $dataVueErr;
    private $dataVue;
    private $frontEndData = array();

    function __construct() {
        //Connexion database
        global $mdp, $login, $dsn;
        $this->con = new Connection($dsn,$login,$mdp);

        try{
            //Test si une action est définie
            if(isset($_REQUEST['action'])) $action=$_REQUEST['action'];
            else $action = null;

            switch($action) {
                case "liste":
                    $this->Reinit();
                    break;
                default: //Action non comprise dans le switch
                    $this->Reinit();
                    break;
            }
        } catch (PDOException $e) //Erreur SQL
        {
            echo $e->getMessage();
            //$this->display("erreur");

        }
        catch (Exception $e2) //Si autre
        {
            echo $e2->getMessage();
            //$this->display("erreur");
        }
        exit(0);
    }
    //Permet l'affichage de l'acceuil
    function Reinit() {

        global $front;
        $model = new Modele();
        $front = $model->getObjets($this->con);
        usort($front, function(Objet $o, Objet $o2){
            return $o->getLast() < $o2->getLast();
        });
        $this->display(LISTE);
    }
    private function display($vue){
        global $rep, $vues, $front; //Ne pas enlever ($front)
        //require($rep . $vues["header"]);
        require($rep . $vues[$vue]);
        //require($rep . $vues["footer"]);
    }
}
?>



