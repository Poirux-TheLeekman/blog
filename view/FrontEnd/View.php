<?php $title="Blog : Un billet pour l'Alaska";
$headaddon=null;?>

					<?php  ob_start();?>
   			<div class="jumbotron">
   			<div class="row">     			
     			<div class="col-sm-6">
         					   <div class="panel panel-default">
                          			<div class="panel-heading">
                        				<h3 class="panel-title">L'auteur</h3>
                        			</div>
                        			<div class="panel-body">
                        			Jean forteroche est un auteur canadien fasciné de grands espaces.Bercé très dans le doux monde de la littérature, il publia son premier roman dans les années 90. Parus aux éditions Élan Sud, mes romans abordent différentes facettes de la vie, les points communs, la condition humaine et l’écriture poétique. Quand je soulève l’épiderme des hommes, je ne vois que des similitudes. Je préfère m’intéresser à ce qui se ressemble et donc s’assemble plutôt qu’au contraire. Le monde a besoin de s’apaiser. Chaque opus se déroule dans des univers contrastés. L’histoire n’est souvent qu’un prétexte pour explorer sous un autre jour une nouvelle facette du monde, et puis je m’attache à l’écriture, au mot, à sa résonance, à son écho. Pas de suite, pas de routine, une remise à plat à chaque fois, comme s’il y avait urgence, pas de temps à perdre en répétant ce qui a déjà été dit. Un roman se prépare à sortir, un nouveau est déjà en chantier et d’autres idées en maturation....
                        			<figure>
	    							<img src="public/assets/img/portrait.jpg" alt="Jean Forteroche" class="img-thumbnail"><figcaption>Jean Forteroche</figcaption>
	    							</figure>
                        	        </div>
                        			<div class="panel-footer"> </div>
                        		</div>	
         			</div>
         			<div class="col-sm-6">
         					   <div class="panel panel-default">
                          			<div class="panel-heading">
                        				<h3 class="panel-title">Le Livre</h3>
                        			</div>
                        			<div class="panel-body">
                        			<em>Un Billet pour l'alaska</em> est le troisième roman de Jean Forteroche. Publié pour la première fois en octobre 2017, le livre fut très favorablement accueilli par la critique.<br />Comment pourrait-on imaginer une maison avec des pièces de la même taille, éclairées de la même façon ? Comment pourrait-on créer un jardin avec une seule variété de fleurs ? Cela m’est impossible… Nous verrons bien à la fin à quoi cela ressemble ! En attendant, j’ai envie de prendre du plaisir… ...
                        			<figure>
	    							<img src="public/assets/img/livre.jpg" alt="Livre" class="img-thumbnail"><figcaption>Le Livre <em>Un Billet pour l'Alaska</em></figcaption>
	    							</figure>
                        			</div>
                        			<div class="panel-footer">Autres oeuvres</div>
                        			
                        		</div>	 				
         			</div>
     			</div>
     			</div>      
         			
     			       
<article>
	<hr>
     	<h4 id="lastarticle">>Dernier Chapitre : </h4><a href="index.php?action=view&article=<?= $lastarticle->id()?>" title="voir l'article <?= $lastarticle->title()?> "><?= $lastarticle->title()?></a>
     	<div><?=substr($lastarticle->content(),0,950).' ...'?></div>
     	<div class="dh">le <?=htmlspecialchars($lastarticle->datetime())?></div><br>
       <hr>    	
     	</article>
 <article>
 <hr>   			      
	<h2> Les Chapitres :</h2>
     <br />			      
    <div id="content" class="row">
    
         <?php
     			            
     			            foreach ($articles as $article)  { ?>
                    <div class="col-sm-6 ">
                        <div class="row">
                        	<div class="col-sm-4"><strong><?=$article->title()?></strong> : </div>
                        	<div class="col-sm-4 dh">le <?=$article->datetime()?></div>
                        	<div class="col-sm-4 button"> <a class="btn-sm btn-info btn-lg" role="button" href="index.php?action=view&article=<?= $article->id()?>">voir l'article en entier <span class="glyphicon glyphicon glyphicon-hand-right"></span> </a> </div>  
                        </div>                  
                        <div class="row">
                        	<div class="col-sm-12 "><?= substr($article->content(),0,350).' ...'?></div>
                        </div>                  
                    </div>
                    
                    <?php 
     			     } ?>
      
  
  </div>
 </article>
		                      
                    <?php $content = ob_get_clean();?>
<?php require ('view/FrontEnd/template.php') ;