       <?php $title="Blog : Administration";
       $headaddon="  <script src=\"https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=wa04l8y38m5jbbsp9rrjpd0o35ue49r820q86o03d5zjni91\"></script>
  <script>tinymce.init({ selector:'textarea' });</script>";
       session_start();?>
       

					<?php  ob_start();?>
     			    
     			            <article>
     			            <h2> Articles :</h2>
     			          	<form action="index.php?action=edit" method="post">
            <p>
              <label for="title">Titre</label> : <input type="text" name="title" id="author" value="<?= $_POST['title'] ?>"/><br />
              <label for="statut">Satut</label> : <input type="checkbox" name="statut" id="statut" value="0" checked/>non publié
              										<input type="checkbox" name="statut" id="statut" value="1" />publié <br />
              
              <label for="postarticle">Article</label> : <textarea  name="postarticle" id="postcomment" rows="8" cols="40"><?= $_POST['postcomment'] ?></textarea><br />

              <input type="submit" value="Envoyer" />
            </p>

     	</form>
       				 </article>
		                      
                    <?php $content = ob_get_clean();?>
        <?php require ('view/FrontEnd/template.php') ;
      