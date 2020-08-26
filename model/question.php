<?php

namespace Modele;

use Modele\reponse;

class question {

private $intitule;
private $explication;
private $reponses = array();

    public function __construct($unIntitule)
    {
        $this->intitule = $unIntitule;
    }

    public function getReponses(){
        return $this->reponses;
    }

    public function ajouterReponse(reponse $reponse){
        $this->reponses[] = $reponse;
    }

    public function setExplication($UneExplication){
        $this->explication = $UneExplication;
    }

    public function getIntitule(){
        return $this->intitule;
    }
    public function getExplication(){
        return $this->explication;
    }

    public function getBonneReponse(){
        foreach($this->reponses as $reponse){
            if ($reponse->getBonneReponse()){
                return $reponse->getIntitule();
            }
        }
    }

}

?>