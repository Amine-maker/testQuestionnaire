<?php


 $bonneReponse = 0;

?>

<form method="POST">
    <div class="row justify-content-center">
        <h1 class="text-center">Mon QCM</h1>
    <?php
    $i=0;
    foreach($qcm->getQuestion() as $question){
        $i++;
        ?>
        <div class="col-12 text-center">
            <div class="display-5 font-weight-bold m-1 mt-4"><?= "Question ".$i." : ". $question->getIntitule() ?></div>
        </div>
        <ul class="list-group list-group-item-action" style="width: 20%;">
        <?php
        foreach($question->getReponses() as $reponse){
            ?>
            <li class="list-group-item"><?= $reponse->getIntitule() ?> 
                <input type="radio" id="choix" name="choix<?= $i ?>" value="<?= $reponse->getIntitule() ?>">
            </li>
            <?php
        }
        
            if(isset($_POST["choix".$i])){
            
                if ($question->getBonneReponse() == $_POST["choix".$i]) {
                    $bonneReponse ++;
                    ?><li class="list-group-item list-group-item-action list-group-item-primary"><?php
                        
                }
                else{
                    ?><li class="list-group-item list-group-item-action list-group-item-danger"><?php
                }
            ?>
            
                <div class="col-12 text-center">
                    <p>
                    <?= "Reponse : ". $question->getExplication(); ?>
                    </p>
                </div>
            </li>
            <?php
        }?>
        </ul>
        
    <?php



    }

    $resutat = ($bonneReponse *20)/count($qcm->getQuestion());
    $appreciation = $qcm->getAppreciation($resutat);

    if(isset($_POST["choix1"])){
        ?>
        <div class="alert alert-success fixed-top">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Merci, </strong> votre score est de <?= round($resutat).", ".$appreciation ?></a>
        </div>
        <?php
    }
    ?>
        

    </div>
    <div class="form-group mt-3">
        <button type="submit" style="margin-left: 25%;width:50%" class="btn btn-outline-primary">Envoyer</button>
    </div>
</form>