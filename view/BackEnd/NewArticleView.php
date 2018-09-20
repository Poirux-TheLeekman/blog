       <?php $title="Blog : Administration";
       $headaddon="  <script src=\"https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=wa04l8y38m5jbbsp9rrjpd0o35ue49r820q86o03d5zjni91\"></script>
  <script>tinymce.init({ selector:'textarea' });</script>";
       session_start();?>
       

					<?php  ob_start();?>
     			    
     			            <article>
     			            <h2> Articles :</h2>
     			          	<form action="index.php?action=addcomment" method="post">
            <p>
              <label for="author">Pseudo</label> : <input type="text" name="author" id="author" value="<?= $_POST['author'] ?>"/><br />
              <label for="postcomment">Message</label> : <textarea  name="postcomment" id="postcomment" rows="8" cols="40"><?= $_POST['postcomment'] ?></textarea><br />

              <input type="submit" value="Envoyer" />
            </p>

     	</form>
       				 </article>
		                      
                    <?php $content = ob_get_clean();?>
        <?php require ('view/FrontEnd/template.php') ;
      