<?php $title='Administration : Edit  '.$article->id();
       $headaddon="  <script src=\"https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=wa04l8y38m5jbbsp9rrjpd0o35ue49r820q86o03d5zjni91\"></script>
  <script>tinymce.init({ selector:'textarea' });</script>";?>
					<?php  ob_start();?>
     			            <article>
     			            <h2> Article :</h2>
     			            <ul>
                    <li><p class="pseudo"><strong>Titre :
                        <?=   $article->title(); ?>
                    </strong>
                    <div>Publié : 
                    <? if  ($article->publish()==1) echo 'oui';else echo 'non'; ?></div>
                    <div class="dh">le
                        <?= $article->datetime() ?>
                    </div>
                    <div class=""><a href="index.php?action=delete&article=<?=htmlspecialchars($article->id())?>">  Supprimer</a></div></li>
                                   </ul>
       				 </article>
       				 <h3>Nouveau contenu  :</h3>
       				 <form action="index.php?action=edit&article=<?=   $article->id(); ?>" method="post">
            <p>
              <label for="title"> Titre</label> : <input type="text" name="title" id="title" value="<?=   $article->title() ?>"/><br />
              <label for="statut"> Statut</label> : <select name="publish">
              <option value="0" default>non publié</option>
              <option value="1">publié</option>
              </select>
              <label for="content">article</label> : <textarea  name="content" id="content" rows="40" cols="20"><?=   $article->content(); ?></textarea><br />
			
              <input type="submit" value="Envoyer" />
            </p>

     	</form>
       				 
       				
		                      
                    <?php $content = ob_get_clean();?>
                   <?php  require ('view/FrontEnd/template.php') ;
                    
