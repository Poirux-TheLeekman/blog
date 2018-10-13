<?php $title="Blog : Un billet pour l'Alaska";
$headaddon=null;?>

					<?php  ob_start();?>
     			    
     			            <article>
     			            <h2> Articles : <?=  $statutarticles?></h2>
     			            <ul class="list-unstyled">
     			            <?php
     			     foreach ($articles as $article)  {         ?>
                    <li class="jumbotron article">
                        <div class="row">
                        	<div class="col-sm-6"><strong><?=$article->title()?></strong> : <a href="index.php?action=edit&article=<?= $article->id()?>" title="editer l'article <?= $article->title()?>"><span class="dh">Editer l'article</span></a></div>
                        	<div class="col-sm-3 dh">le <?=$article->datetime()?></div>
                        	<div class="col-sm-3 button"> <a class="btn-sm btn-info btn-lg" role="button" href="index.php?action=view&article=<?= $article->id()?>">voir l'article en entier <span class="glyphicon glyphicon glyphicon-hand-right"></span> </a> </div>  
                        </div>                  
                        <div class="row">
                        	<div class="col-sm-12 "><?= substr($article->content(),0,500).' ...'?></div>
                        </div>                  
                    </li>
                        
                  
                    <?php } ?>
                                   </ul>
       				 </article>
		                      
                    <?php $content = ob_get_clean();?>
<?php require ('view/BackEnd/template.php') ;
