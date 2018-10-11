<?php ob_start(); ?>
        <article>
              <h2> <?=$title?>:</h2>
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
                        
                        ?>
                   <li> <div class="comment<?=$class?>"><p class="pseudo"><strong>
                        <?=   htmlspecialchars($comment->author()) ?>
                    </strong> a dit <q>
                        <?=  nl2br (htmlspecialchars($comment->postcomment())) ?>
                    </q><br /></p></div>
                    <div class="dh">le <?=   nl2br($comment->datetime()) ?>
                    </div>
                      <div class="">Signalé <?=   $comment->report()?> fois.</div>
                    <div class=""><a href="index.php?action=comment&del=<?=htmlspecialchars($comment->id())?>">  Supprimer</a></div></li></li>
                    <?php
                        }

                    ?>
              </ul>
                        <?php $content=ob_get_clean(); ?>
   <?php require ('view/FrontEnd/template.php') ;
   