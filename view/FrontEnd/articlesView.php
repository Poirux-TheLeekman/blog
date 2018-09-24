<?php $title="Blog : Un billet pour l'Alaska";
$headaddon=null;?>

					<?php  ob_start();?>
     			    
     			            <article>
     			            <h2> Articles :</h2>
     			            <ul>
     			            <?php
     			     //     while ($article = $articles->fetch())
     			      //     {
     			     foreach ($articleslist as $article)  {         ?>
                    <li><p class="pseudo"><strong>                    
                       
                       <?= htmlspecialchars($article->title())?>
                    </strong> : <q>
                                               <?= htmlspecialchars(substr($article->content(),0,300).' ...')?>
                        
                    </q><div class="button"> <a href="index.php?action=view&article=<?= $article->id()?>">  voir l'article en entier </a> </div>
                    <div class="dh">le <?=htmlspecialchars($article->datetime())?>
                    
                    </div></li>
                    
                    <?php
     			            }

                   //   $articles->closeCursor();?>
                                   </ul>
       				 </article>
		                      
                    <?php $content = ob_get_clean();?>
<?php require ('view/FrontEnd/template.php') ;