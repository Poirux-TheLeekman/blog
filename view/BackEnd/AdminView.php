<?php $title="Blog : Administration";
$headaddon= null;
?>

<?php  ob_start();?>
<h2> Articles :</h2>
<div class="row">
	<div class="col-sm-4">
		<a href="index.php?action=new"><h2>Ajouter un nouvel article</h2></a>
	</div>
	<div class="col-sm-3 col-sm-offset-1">
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
	</div>
	<div class="col-sm-4">
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
	</div>
	
		
 		
</div>

	<article>
	<hr>
		<div class="jumbotron">
	

     	<h4 id="lastarticle">Dernier article : </h4><a href="index.php?action=view&article=<?= $lastarticle->id()?>" title="voir l'article <?= $lastarticle->title()?> "><?= $lastarticle->title()?></a> <?php
     	if ($lastarticle->publish()==1) {
     	  echo   'publié';
     	  }
     	  else {echo ' (non-publié)';}
        ?>
     
     	<div><?=substr($lastarticle->content(),0,500).' ...'?><a href="index.php?action=edit&article=<?= $lastarticle->id()?>" title="editer l'article <?= $lastarticle->title()?> "><div class="dh">Editer l'article</div></a></div>
     	<div class="dh">le <?=htmlspecialchars($lastarticle->datetime())?></div><br>
        </div>
       <hr>    	
     	</article> 
<div id="commentaires" class="row">
	<h2> Commentaires :</h2>
		<div class="col-sm-3 col-sm-offset-5">
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
		</div>
        <div class="col-sm-4">
        	<form action="index.php?action=view" method="post">
 				<h3> voir tous les commentaires</h3>
       			<label for="commentsarticle">de l'article </label>
       			<select name="commentsarticle">
       			<?php foreach ($allarticles as $article){?>
       			<option value="<?= $article->id() ?>"> <?= $article->title()?></option> 
       			<?php }?>
       			</select>
		  		<input type="submit" value="Envoyer" />       	
       		</form>
        </div>  
        
</div>     	                            

<hr>		     
<h3> Derniers Commentaires</h3><br />
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
		     			     		    foreach ($allarticles as $article){
		     			     		           if ($comment->idarticle()===$article->id()){
		     			     		               $articletitle=$article->title();
		     			     		           }
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
		                      
<?php $content = ob_get_clean();?>
<?php require ('view/BackEnd/template.php') ;
      