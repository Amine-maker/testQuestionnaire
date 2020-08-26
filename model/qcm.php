<?php

namespace Modele;

use Modele\question;

class qcm {

    
    private $questions = array();
    private $appreciation = array();


    public function ajouterQuestion(question $question){
        array_push($this->questions, $question);
    }

    public function getQuestion(){
        return $this->questions;
    }

    public function generer(){
        return 1;
    } 

    public function setAppreciation(array $uneappreciation){
        $this->appreciation = $uneappreciation;
    }
    public function getAppreciation($resultat){

        $tab = array_keys($this->appreciation);
        //var_dump($tab);

         for($i=0; $i <= count($tab)-1; $i++){
             $tabBeetween[] = explode("-",$tab[$i]);
             if(intval($tabBeetween[$i][0]) <= $resultat && intval($tabBeetween[$i][1]) >= $resultat){
                $app = $this->appreciation[$tabBeetween[$i][0]."-".$tabBeetween[$i][1]];
                //return $tabBeetween;
             }
         }
        
        return $app;
    }
    
    public function getQuestionFromMd5($md5) {

        foreach($this->question as $q){
            if($q->getReponses()== $md5){
                return $q;
            }
            else{
                return false;
            }
        }
                        }

}