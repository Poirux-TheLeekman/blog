       <?php $title="Blog : Administration";
       $headaddon="  <script src=\"https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=wa04l8y38m5jbbsp9rrjpd0o35ue49r820q86o03d5zjni91\"></script>
  <script>tinymce.init({ selector:'textarea' });</script>";
       session_start();?>
       

					<?php  ob_start();?>
     			    
     			            <article>
     			            <h2> Articles :</h2>
     			          	<form action="index.php?action=edit" method="post">
            <p>
              <label for="Title">Titre</label> : <input type="text" name="title" id="author" value="<?= $article->title()?>"/><br />
              <label for="postcomment">Texte</label> : <textarea  name="article" id="postcomment" rows="8" cols="40"><?= $article->content() ?></textarea><br />

              <input type="submit" value="Envoyer" />
            </p>

     	</form>
       				 </article>
		                      
                    <?php $content = ob_get_clean();?>
        <?php require ('view/FrontEnd/template.php') ;
      