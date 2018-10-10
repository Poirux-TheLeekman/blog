<?php $title='Un billet pour l\'Alaska : Article  '.$article->id();
$headaddon=null;?>
					<?php  ob_start();?>
     			            <article>
     			            <h2> Article :</h2>
     			            <ul>
                    <li><p class="pseudo"><strong>
                        <?=   $article->title(); ?>
                    </strong> : <q>
                        <?=   $article->content()?>
                    <div class="dh">le
                        <?= $article->datetime() ?>
                    </div>
                    <a href="index.php?action=edit&article=<?= $article->id()?>" title="editer l'article <?= $article->title()?> "><div class="dh">Editer l'article</div></a></div>
                    </li>
                                   </ul>
       				 </article>
       				 <h3>Laisser un Commentaire :</h3>
       				 <form action="index.php?action=comment&article=<?=   $article->id(); ?>" method="post">
            <p>
              <label for="author">Pseudo</label> : <input type="text" name="author" id="author" value="<?= $_POST['author'] ?>"/><br />
              <input type="hidden" name="articletitle" value="<?=$article->title() ?>" DEFAULT></option>  
              </select>
              <label for="postcomment">Message</label> : <textarea  name="postcomment" id="postcomment" rows="8" cols="40"><?= $_POST['postcomment'] ?></textarea><br />
			
              <input type="submit" value="Envoyer" />
            </p>

     	</form>
       				 
       				 <aside>
       				 <ul> <h3>Derniers Commentaires :</h3>
                    <?php 
                    foreach ($comments as $comment){ 
                    ?>
                    
                   <li> <div class="postview"><p class="pseudo"><strong>
                        <?=   htmlspecialchars($comment->author()) ?>
                    </strong> a dit <q>
                        <?=  nl2br (htmlspecialchars($comment->postcomment())) ?>
                    </q><br /></p></div>
                    <div class="dh">le<?=   htmlspecialchars($comment->datetime())?>
                    </div><div class=""><a href="index.php?action=comment&del=<?=htmlspecialchars($comment->id())?>">  Supprimer</a></div></li>
                    <?php
                    }
                    ?>
              </ul>
       				 </aside>
		                      
                    <?php $content = ob_get_clean();?>
                   <?php  require ('view/FrontEnd/template.php') ;
                    