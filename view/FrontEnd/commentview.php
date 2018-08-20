<?php $title="commentaire"?>
            <?php ob_start(); ?>
        <article>
              <h2> message d'origine:</h2>
              <ul>
                    <?php
                         while ($data = $comment->fetch())
                        {
                        ?>
                    <li><p class="pseudo"><strong>
                        <?=   htmlspecialchars($data['author']) ?>
                    </strong> a dit <q>
                        <?=  nl2br(htmlspecialchars($data['postcomment'])) ?>
                    </q><br /></p>
                    <div>le<?=   nl2br($data['datetimefr']) ?>
                    </div></li></ul>
                    <?php
                        }
                      $comment->closeCursor();
                        ?>
        </article>
  <form action="index.php?action=edit&postId=<?= ($_GET['postId']) ?>" method="post">
            <p>
              <label for="author">Pseudo</label> : <input type="text" name="author" id="author" value="<?= $_POST['author'] ?>"/><br />
              <label for="postcomment">Message</label> : <textarea  name="postcomment" id="postcomment" rows="8" cols="40"><?= $_POST['postcomment'] ?></textarea><br />
              <input type="submit" value="Envoyer" />
              
            </p>

        </form>    
                        <?php $content=ob_get_clean(); ?>
   <?php require ('view/FrontEnd/template.php') ;
   