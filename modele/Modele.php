<?php


class Modele
{
    public function getObjets($con){
        $gatewayObj = new GatewayObjet($con);
        return $gatewayObj->getObjet();
    }
}