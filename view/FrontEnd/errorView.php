<?php $title="erreur";
session_start();
?>

            <?php ob_start(); ?>
        <article>
  
       
               <div id="error">
              <h2> Information :</h2>
              <div id=errorinfo><?=$errorMessage?></div>
                     <?php  var_dump($affectedline);?>
              
              <a class="img" href="index.php"><img src="public/elephpant-error.png" alt="elephpant says : Error" title="Retour à la page d'accueil"/></a>
              </div>
                  
        </article> 
                        <?php $content=ob_get_clean(); ?>
              <?php 
              require ('view/FrontEnd/template.php') ;
              