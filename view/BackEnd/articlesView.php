<?php $title="Blog : Un billet pour l'Alaska";
$headaddon=null;?>

					<?php  ob_start();?>
     			    
     			            <article>
     			            <h2> Articles : <?=  $statutarticles?></h2>
     			            <ul>
     			            <?php
     			     foreach ($articles as $article)  {         ?>
                    <li><p class="pseudo"><strong>                    
                       
                       <?= htmlspecialchars($article->title())?>
                    </strong> : <q>
                                               <?= htmlspecialchars(substr($article->content(),0,250).' ...')?>
                        
                    </q><div class="button"> <a href="index.php?action=view&article=<?= $article->id()?>">  voir l'article en entier </a> </div>
                    <div class="dh">le <?=htmlspecialchars($article->datetime())?><a href="index.php?action=edit&article=<?= $article->id()?>" title="editer l'article <?= $article->title()?> "><div class="dh">Editer l'article</div></a></div>	
                    
                    </div></li>
                    
                    <?php } ?>
                                   </ul>
       				 </article>
		                      
                    <?php $content = ob_get_clean();?>
<?php require ('view/FrontEnd/template.php') ;