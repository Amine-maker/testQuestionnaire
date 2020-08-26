
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <a class="navbar-brand">Qcm</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Mon QCM</a>
      </li>
    </ul>
  </div>
</nav>

<body>    

<div class="container">



<?php

require_once("model/qcm.php");
require_once("model/question.php");
require_once("model/reponse.php");


use Modele\qcm;
use Modele\question;
use Modele\reponse;

$qcm = new qcm();

$BONNE_REPONSE = true;



$question1 = new question("comment m'appelle t'on ?");
$question1->ajouterReponse(new reponse("amine", $BONNE_REPONSE));
$question1->ajouterReponse(new reponse("jhon"));
$question1->ajouterReponse(new reponse("yanis"));

$question1->setExplication("et oui, je m'appelle bien amine");

$qcm->ajouterQuestion($question1);

$question2 = new question("quel age j'ai ?");
$question2->ajouterReponse(new reponse(18));
$question2->ajouterReponse(new reponse(20, $BONNE_REPONSE));
$question2->ajouterReponse(new reponse(12));

$question2->setExplication("oui j'suis née en 2000");

$qcm->ajouterQuestion($question2);

$question3 = new question("ou est ce que j'habite ?");
$question3->ajouterReponse(new reponse("paris"));
$question3->ajouterReponse(new reponse("levallois",$BONNE_REPONSE));
$question3->ajouterReponse(new reponse("nantes"));
$question3->ajouterReponse(new reponse("marseille"));


$question3->setExplication("simple");

$qcm->ajouterQuestion($question3);


$qcm->setAppreciation(array("0-5"=>"nul", "6-11"=>"ca va presque la moyenne", "12-20"=> "c'est bien"));

include("view/generer.php");

 //var_dump($qcm);
 //var_dump($question1->getReponses());


?>
</div>
</body>
</html>