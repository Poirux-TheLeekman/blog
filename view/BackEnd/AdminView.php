<?php $title="Blog : Administration";
$headaddon= null;
?>

<?php  ob_start();?>
<h2> Articles :</h2>
	<aside> <a href="index.php?action=new">Ajouter un nouvel article</a></aside>
		<form action="index.php?action=view" method="post">
   			<h3> voir tous les articles</h3>
       		<label for="statutarticles">statuts </label>
           		<select name="statutarticles">
           			<option value="1"> publiés</option> 
           			<option value="0" DEFAULT> non-publiés</option>
           			<option value="2"> tous</option> 
           		</select>
       	 	<input type="submit" value="Envoyer" />
		</form>
 		<form action="index.php?" method="get">
  			<h3> voir l'article</h3>
  			<label for="idarticle">titre : </label>
  			<input type="hidden" name="action" value="view" />
           		<select name="article"><?php 
           		foreach ($allarticles as $article){?>
           			<option value="<?= $article->id() ?>"> <?= $article->title()?></option> <?php }?>
           		</select>
       		<input type="submit" value="Envoyer" />
       </form>
	<article>
     	<h4><a href="index.php?action=view&article=<?= $lastarticle->id()?>" title="voir l'article <?= $lastarticle->title()?> ">Dernier article : <?= $lastarticle->title()?></a> <?php
     	if ($lastarticle->publish()==1) {
     	  echo   'publié';
     	  }
     	  else {echo ' (non-publié)';}
        ?>
      </h4>
     	<div><?=htmlspecialchars(substr($lastarticle->content(),0,250)).' ...'?><a href="index.php?action=edit&article=<?= $lastarticle->id()?>" title="editer l'article <?= $lastarticle->title()?> "><div class="dh">Editer l'article</div></a></div>
     	<div class="dh">le <?=htmlspecialchars($lastarticle->datetime())?></div><br>
     	</article>                             
       <hr>
<h2> Commentaires :</h2>
       <form action="index.php?action=view" method="post">
  <h3> voir tous les commentaires</h3>
       	<label for="statutcomments">statuts </label>
       		<select name="statutcomments">
       			<option value=0> non-signalés</option> 
       			<option value=1 DEFAULT> signalés</option>
       			<option value=2> tous</option> 
       		</select>
       	 <input type="submit" value="Envoyer" />
       		
       </form>       
        <form action="index.php?action=view" method="post">
 <h3> voir tous les commentaires</h3>
       	<label for="commentsarticle">de l'article </label>
       		<select name="commentsarticle">
       		<?php 
       		foreach ($allarticles as $article){?>
       			<option value="<?= $article->id() ?>"> <?= $article->title()?></option> <?php }?>
       		</select>
		  <input type="submit" value="Envoyer" />       	
       </form>
		     
		          	<h3> Derniers Commentaires</h3>
		     			     		<ul>
		     			     		<?php     		
		     			     		
		     			     		foreach ($comments as $comment){
		     			     		       if ($comment->report() ===0){
		     			     		        $class=0;
		     			     		       }
		     			     		   elseif ($comment->report() ===1){
		     			     		       $class=1;
		     			     		       }
		     			     		   else{
		     			     		       $class=2; 
		     			     		       }
		     			     		    foreach ($allarticles as $article){
		     			     		           if ($comment->idarticle()===$article->id()){
		     			     		               $title=$article->title();
		     			     		           }
		     			     		       }
		     			     		?><li>
		     			     		<div class="comment<?=$class?>">
		     			     		    Pseudo : <?=htmlspecialchars($comment->author())?> a posté sur <em><?=htmlspecialchars($title)?></em><br> <?=htmlspecialchars($comment->postcomment())?> <br>le <?=htmlspecialchars($comment->datetime())?> Signalement : <?=htmlspecialchars($comment->report())?> 
		     			     		<div class="dh"><a href="index.php?action=comment&del=<?=htmlspecialchars($comment->id())?>">Supprimer</a></div>
		     			     		</div>
		     			     		
		     			     		</li>
		     			     		<?php 
		     			     		}?>
		     			     		 </ul>   
		                      
<?php $content = ob_get_clean();?>
<?php require ('view/FrontEnd/template.php') ;
      