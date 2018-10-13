<?php $title='Un billet pour l\'Alaska : Article  '.$article->id();
$headaddon=null;?>
					<?php  ob_start();?>
     			            <article>
     			            <h2> Article :</h2>
     			            <ul class="list-unstyled">
                    <li><p class="pseudo"><strong>
                        <?=   $article->title(); ?>
                    </strong> : 
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
              <input type="hidden" name="articletitle" value="<?=$article->title() ?>">
              <label for="postcomment">Message</label> : <textarea  name="postcomment" id="postcomment" rows="8" cols="40"><?= $_POST['postcomment'] ?></textarea><br />
			
              <input type="submit" value="Envoyer" />
            </p>

     	</form>
       				 
       				 <aside>
       				 <h3>Derniers Commentaires :</h3>
       				 
                    <ul class="list-unstyled">
		     			     		<?php     		
		     			     		
		     			     		foreach ($comments as $comment){
		     			     		       if ($comment->report() ===0){
		     			     		           echo '<li class="article list-group-item list-group-item-success">';
		     			     		       }
		     			     		   elseif ($comment->report() ===1){
		     			     		       echo '<li class="article list-group-item list-group-item-warning">';
		     			     		       
		     			     		       }
		     			     		   else{
		     			     		       echo '<li class="article list-group-item list-group-item-danger">';
		     			     		       
		     			     		       }
		     			     		
		     			     		?>
		     			     		<div class="row">
		     			     		 <div class="col-sm-6">  Pseudo : <?=htmlspecialchars($comment->author())?> a posté sur <em><?=htmlspecialchars($articletitle)?></em></div> 
		     			     		 <div class="col-sm-4 col-sm-offset-8">le <?=htmlspecialchars($comment->datetime())?> Signalement : <?=htmlspecialchars($comment->report())?> </div>  
		     			     		 </div>
		     			     		 <div class="row"> 
		     			     		 <div class="col-sm-8"><div class="comment<?=$class?>"><?=htmlspecialchars($comment->postcomment())?></div></div> 
		     			     		<div class="dh col-sm-4 col-sm-offset-8"><a href="index.php?action=comment&del=<?=htmlspecialchars($comment->id())?>">Supprimer</a></div>
		     			     		</div>
		     			     		</li>
		     			     		
		     			     		<?php 
		     			     		}?>
		     			     		 </ul>   
       				 </aside>
		                      
                    <?php $content = ob_get_clean();?>
<?php require ('view/BackEnd/template.php') ;
                    
