<?php $title="Blog : Un billet pour l'Alaska";?>

					<?php  ob_start();?>
     			    
     			            <article>
     			            <h2> Articles :</h2>
     			            <ul>
     			            <?php
     			            while ($data = $articles->fetch())
     			            {
     			                ?>
                    <li><p class="pseudo"><strong>
                        <?=   htmlspecialchars($data['title']) ?>
                    </strong> : <q>
                        <?=   htmlspecialchars($data['content']) ?>
                    </q><div class="button"> <a href="index.php?action=view&article= <?=   htmlspecialchars($data['id']) ?>">  voir l'article </a> </div>
                    <div class="dh">le
                        <?= htmlspecialchars($data['datetimefr']) ?>
                    </div></li>
                    
                    <?php
     			            }

                      $articles->closeCursor();?>
                                   </ul>
       				 </article>
		                      
                    <?php $content = ob_get_clean();?>
<?php require ('view/FrontEnd/template.php') ;