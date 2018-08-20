<?php $title="commentaires"?>
            <?php ob_start(); ?>
    
    	<form action="index.php?action=addcomment" method="post">
            <p>
              <label for="author">Pseudo</label> : <input type="text" name="author" id="author" value="<?= $_POST['author'] ?>"/><br />
              <label for="postcomment">Message</label> : <textarea  name="postcomment" id="postcomment" rows="8" cols="40"><?= $_POST['postcomment'] ?></textarea><br />

              <input type="submit" value="Envoyer" />
            </p>

     	</form>
     	<article>
              <h2>Dernier message :</h2>
              <ul>
              <?php 
                      while ($data = $comments->fetch())
                        {
                        ?>
                   <li> <div class="postview"><p class="pseudo"><strong>
                        <?=   htmlspecialchars($data['author']) ?>
                    </strong> a dit <q>
                        <?=  nl2br (htmlspecialchars($data['postcomment'])) ?>
                    </q><br /></p><a href="index.php?action=view&postId=<?=   nl2br ($data['id']) ?>" class="button">modifier</a></div>
                    <div class="dh">le<?=   nl2br($data['datetimefr']) ?>
                    </div></li>
                    <?php
                        }

                      $comments->closeCursor();
                    ?>
              </ul>
      	</article>
      	                        <?php $content=ob_get_clean(); ?>
        <?php require ('view/FrontEnd/template.php') ;
      