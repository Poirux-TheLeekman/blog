<?php $title="commentaires"?>
            <?php ob_start(); ?>
        <article>
              <h2> message d'origine:</h2>
             <?php 
             foreach ($comments as $comment){
                        
                        ?>
                   <li> <div class="postview"><p class="pseudo"><strong>
                        <?=   htmlspecialchars($comment->author()) ?>
                    </strong> a dit <q>
                        <?=  nl2br (htmlspecialchars($comment->postcomment())) ?>
                    </q><br /></p><a href="index.php?action=view&postId=<?=   nl2br ($comment->id) ?>" class="button">supprimer</a></div>
                    <div class="dh">le<?=   nl2br($comment->datetimefr) ?>
                    </div></li>
                    <?php
                        }

                    ?>
              </ul>
                        <?php $content=ob_get_clean(); ?>
   <?php require ('view/FrontEnd/template.php') ;
   