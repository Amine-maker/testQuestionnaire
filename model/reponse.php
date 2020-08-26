<?php 

namespace Modele;


class reponse {

    private $intitule;
    private $BONNE_REPONSE;

    public function __construct($unIntitule, $BONNE_REPONSE = false)
    {
        $this->intitule = $unIntitule;
        $this->BONNE_REPONSE = $BONNE_REPONSE;
    }

    public function getIntitule(){
        return $this->intitule;
    }
    public function getBonneReponse(){
        return $this->BONNE_REPONSE;
    }
}