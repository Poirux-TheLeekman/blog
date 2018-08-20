<?php $title="Un billet pour l'Alaska : Article : ".$idarticle?>
					<?php  ob_start();?>
     			    
     			            <article>
     			            <h2> Article :</h2>
     			            <ul>
     			            <?php
     			            while ($data = $article->fetch())
     			            {
     			                ?>
                    <li><p class="pseudo"><strong>
                        <?=   htmlspecialchars($data['title']) ?>
                    </strong> : <q>
                        <?=   htmlspecialchars($data['content']) ?>
                    <div class="dh">le
                        <?= htmlspecialchars($data['datetimefr']) ?>
                    </div></li>
                    
                    <?php
     			            }

                      $article->closeCursor();?>
                                   </ul>
       				 </article>
       				 <aside>
       				 <ul>
                    <?php 
                    while ($data = $comments->fetch())
                    {
                        ?>
                   <li> <div class="postview"><p class="pseudo"><strong>
                        <?=   htmlspecialchars($data['author']) ?>
                    </strong> a dit <q>
                        <?=  nl2br (htmlspecialchars($data['postcomment'])) ?>
                    </q><br /></p><a href="index.php?action=view&postId=<?=   nl2br ($data['id']) ?>" class="button">modifier</a></div>
                    <div class="dh">le<?=   nl2br($data['datetimefr']) ?>
                    </div></li>
                    <?php
                        }

                      $comments->closeCursor();
                    ?>
              </ul>
       				 </aside>
		                      
                    <?php $content = ob_get_clean();?>
                   <?php  require ('view/FrontEnd/template.php') ;
                    
