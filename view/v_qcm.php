

<div class="row">
    <div class="col-12">
        <h2 class="text-center">Mon QCM</h2>
        <form class="inner ml-5 mr-5" action="" method="post"> 

        <div class="shadow p-2">

            <div id="question">
                <h2 class="ml-3">Question 1</h2>
                <div class="form-group" id="question0">
                    <input type="text" class="form-control mb-2" name="question0[intituleQ]" placeholder="Intitule de la question">
                       
                    
                    <div id="reponseQ0">
                        <div class="col-3">
                            <input placeholder="Intitule de la Reponse" type="text" class="form-control" name="question0[intituleR][]">
                            <input type="checkbox" id="choix" name="question0[choix0]" value="1">
                            <label for="choix">Bonne réponse</label>
                        </div>
                    </div> 
                    <div class="form-group">
                        <input type="text" name="question0[explication]" class="form-control" placeholder="explication">
                    </div>
                </div> 
            </div>
            <div class="form-group">
                <a class="btn btn-outline-primary btn-block m-2" id="addQ">ajouter une question</a>
                <a class="btn btn-outline-danger btn-block m-2" id="addRq0">ajouter reponse</a>
            </div>
        </div>

                

                <div class="row">
                    <div class="col">
                        <button class="btn btn-outline-danger float-right shadow" type="submit">generer</button>
                    </div>
                </div>

        </form>
    </div>  
</div>


 <script>
var i = 0;
var j = 0;


$(document).ready(function(){
        $('#addQ').click(function(){
            j++;
            i=0;
             $('#question').append(
                 '<h2 class="ml-3">Question'+(j+1)+'</h2>'  
                +'<div class="form-group" id="question'+j+'">'
                +'<input type="text" class="form-control mb-2" name="question'+j+'[intituleQ]" placeholder="Intitule de la question">'
                +'<div id="reponseQ'+j+'">'
                    +'<div class="col-3">'
                        +'<input placeholder="Intitule de la Reponse" type="text" class="form-control" name="question'+j+'[intituleR][]">'
                        +'<input type="checkbox" id="choix" name="question'+j+'[choix'+i+']" value="1">'
                        +'<label for="choix">Bonne réponse</label>'
                    +'</div>'
                +'</div>'
                +'<div class="form-group">'
                        +'<input type="text" name="question'+j+'[explication]" class="form-control" placeholder="explication">'
                    +'</div>'
            +'</div>');
         });
     });

     $(document).ready(function(){
        $('#addRq'+j+'').click(function(){
            i++;
              
             $('#reponseQ'+j+'').append(
                '<div class="col-3">'
                    +'<input placeholder="Intitule de la Reponse" type="text" class="form-control" name="question'+j+'[intituleR][]">'
                    +'<input type="checkbox" id="choix" name="question'+j+'[choix'+i+']" value="1">'
                    +'<label for="choix">Bonne réponse</label>'
                +'</div>');
         });
     });



</script> 

<?php

use Modele\question;
use Modele\reponse;



if(isset($_POST)){

    //var_dump($_POST);

    for ($j=0; $j < count($_POST); $j++) { 
             
        $question = new question($_POST["question".$j.""]["intituleQ"]);

        for ($i=0; $i < count($_POST["question".$j.""]["intituleR"]); $i++) { 
            if(!isset($_POST["question".$j.""]["choix".$i.""])){

                $BONNE_REPONSE = false;
            }
            else{
                $BONNE_REPONSE = true;
            }
        $question->ajouterReponse(new reponse($_POST["question".$j.""]["intituleR"][$i],$BONNE_REPONSE));
        }
        $question->setExplication($_POST["question".$j.""]["explication"]);
        $qcm->ajouterQuestion($question);
        var_dump($qcm);
        var_dump($question->getReponses());
        }
}
?>