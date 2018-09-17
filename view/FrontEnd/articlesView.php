<?php $title="Blog : Un billet pour l'Alaska";?>

					<?php  ob_start();?>
     			    
     			            <article>
     			            <h2> Articles :</h2>
     			            <ul>
     			            <?php
     			     //     while ($article = $articles->fetch())
     			      //     {
     			     foreach ($articleslist as $article)  {         ?>
                    <li><p class="pseudo"><strong>                    
                       
                       <?= $article->title()?>
                    </strong> : <q>
                                               <?= $article->content()?>
                        
                    </q><div class="button"> <a href="index.php?action=view&article=<?= $article->id()?>">  voir l'article </a> </div>
                    <div class="dh">le <?= $article->datetime()?>
                    
                    </div></li>
                    
                    <?php
     			            }

                   //   $articles->closeCursor();?>
                                   </ul>
       				 </article>
		                      
                    <?php $content = ob_get_clean();?>
<?php require ('view/FrontEnd/template.php') ;