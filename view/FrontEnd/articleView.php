<?php $title='Un billet pour l\'Alaska : Article  '.$article->id();
$headaddon=null;?>
					<?php  ob_start();?>
     			            <article>
     			            <h2> Chapitre :</h2>
     			            <ul class="list-unstyled">
                    <li><p class="pseudo"><strong>
                        <?=   $article->title(); ?>
                    </strong> :
                        <?=   $article->content()?>
                    <div class="dh">le
                        <?= $article->datetime() ?>
                    </div></li>
                                   </ul>
       				 </article>
       				 <h3>Laisser un Commentaire :</h3>
       				 <form action="index.php?action=comment&article=<?=   $article->id(); ?>" method="post">
            <p>
              <label for="author">Pseudo</label> : <input type="text" name="author" id="author" value="<?= $_POST['author'] ?>"/><br />
              <input type="hidden" name="articletitle" value="<?=$article->title() ?>">
              <label for="postcomment">Message</label> : <textarea  name="postcomment" id="postcomment" rows="8" cols="40"><?= $_POST['postcomment'] ?></textarea><br />
			
              <input type="submit" value="Envoyer" />
            </p>

     	</form>
       				 
       				 <aside>
       				  <h3>Derniers Commentaires :</h3>
                    <?php 
                    foreach ($comments as $comment){ 
                    ?>
                    <div class="article">
                        <div class="row">
    		     		    <div class="col-sm-10">  Pseudo : <?=htmlspecialchars($comment->author())?> a posté sur <em><?=htmlspecialchars($articletitle)?></em></div> 
    		       		    <div class="col-sm-2">le <?=htmlspecialchars($comment->datetime())?></div>  
    		     		</div>
    		     	    <div class="row"> 
    		     	    	<div class="col-sm-11"><div class="comment<?=$class?>"><?=htmlspecialchars($comment->postcomment())?></div></div> 
    		     			<div class="dh col-sm-1"><a href="index.php?action=report&id=<?=   nl2br ($comment->id()) ?>&R=<?=   nl2br ($comment->report()) ?>" class="button">Signaler</a></div>
    		       		</div>
                    </div>
                    <?php
                    }
                    ?>
       				 </aside>
		                      
                    <?php $content = ob_get_clean();?>
                   <?php  require ('view/FrontEnd/template.php') ;
                    
