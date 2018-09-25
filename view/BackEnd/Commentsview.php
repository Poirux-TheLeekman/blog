<?php $title="commentaire"?>
            <?php ob_start(); ?>
        <article>
              <h2> message d'origine:</h2>
             <?php 
                      while ($data = $comments->fetch())
                        {
                        ?>
                   <li> <div class="postview"><p class="pseudo"><strong>
                        <?=   htmlspecialchars($data['author']) ?>
                    </strong> a dit <q>
                        <?=  nl2br (htmlspecialchars($data['postcomment'])) ?>
                    </q><br /></p><a href="index.php?action=view&postId=<?=   nl2br ($data['id']) ?>" class="button">supprimer</a></div>
                    <div class="dh">le<?=   nl2br($data['datetimefr']) ?>
                    </div></li>
                    <?php
                        }

                      $comments->closeCursor();
                    ?>
              </ul>
                        <?php $content=ob_get_clean(); ?>
   <?php require ('view/FrontEnd/template.php') ;
   