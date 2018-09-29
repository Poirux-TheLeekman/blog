<?php $title="Blog : Administration";
$headaddon= null;
?>

<?php  ob_start();?>
     			    <?= var_dump($GLOBALS)?>
       <h2> Articles :</h2>
       <aside> <a href="index.php?action=new">Ajouter un nouvel article</a></aside>
       <form action="index.php?action=view" method="post">
                   	<h3> voir tous les articles</h3>
       	<label for="statutarticles">statuts </label>
       		<select>
       			<option value="1"> publiés</option> 
       			<option value="0" DEFAULT> non-publiés</option>
       			<option value="2"> tous</option> 
       		</select>
       	 <input type="submit" value="Envoyer" />
       </form>
     	 <form action="index.php?action=edit" method="post">
     	                    	<h3> voir l'article</h3>
       	<label for="idarticle">titre : </label>
       		<select>
       		<?php 
       		foreach ($articles as $article){?>
       			<option value="<?= $article->id() ?>"> <?= $article->title()?></option> <?php }?>
       		</select>
       	 <input type="submit" value="Envoyer" />
       </form>
       <article>
     	<h4> Dernier article : <?= $lastarticle->title()?> <?php
     	if ($lastarticle->publish()==1) {
     	  echo   'publié';
     	  }
     	  else {echo ' (non-publié)';}
        ?></h4>
     	<div><?=substr($lastarticle->content(),0,350)?><a href="index.php?action=view&articleid"> ...<div class="dh">editer</div></a></div>
     	<div class="dh">le <?=htmlspecialchars($lastarticle->datetime())?></div><br>
     	</article>
     	
     	
                             
       <hr>
       <h2> Commentaires :</h2>
       <form action="index.php?action=view" method="post">
              <h3> voir tous les commentaires</h3>
       	<label for="statutarticles">statuts </label>
       		<select>
       			<option value="0"> non-signalés</option> 
       			<option value="1" DEFAULT> signalés</option>
       			<option value="3"> tous</option> 
       		</select>
       	 <input type="submit" value="Envoyer" />
       		
       </form>       
        <form action="index.php?action=view" method="post">
                      <h3> voir tous les commentaires</h3>
       	<label for="statutarticles">de l'article </label>
       		<select>
       		<?php 
       		foreach ($articles as $article){?>
       			<option value="<?= $article->id() ?>"> <?= $article->title()?></option> <?php }?>
       		</select>
		  <input type="submit" value="Envoyer" />       	
       </form>
		     
		          	<h3> Derniers Commentaires</h3>
		     			     		<ul>
		     			     		<?php     		
		     			     		
		     			     		foreach ($comments as $comment)
		     			     		{?><li>
		     			     		<div class="comment<?=$comment->report()?>">
		     			     		    auteur : <?=htmlspecialchars($comment->author())?> <?=htmlspecialchars($comment->postcomment())?> <?=htmlspecialchars($comment->datetime())?> <?=htmlspecialchars($comment->idarticle())?> 
		     			     		</div>
		     			     		</li><?php }
		     			     		?>
		     			     		 </ul>   
		                      
<?php $content = ob_get_clean();?>
<?php require ('view/FrontEnd/template.php') ;
      