       <?php $title="Blog : Administration";
       $headaddon="  <script src=\"https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=wa04l8y38m5jbbsp9rrjpd0o35ue49r820q86o03d5zjni91\"></script>
  <script>tinymce.init({ selector:'textarea' });</script>";
       session_start();?>
       

					<?php  ob_start();?>
     			    
     			            <article>
     			            <h2> Articles :</h2>
     			          	<form action="index.php?action=new" method="post">
            <div col-sm-12>
              <label for="Title">Titre</label> : <input type="text" name="title" id="author" value="Titre"/><br />
			   <label for="statut"> Statut</label> : <select name="publish">
              <option value="0" default>non publié</option>
              <option value="1">publié</option>
              </select>
              <textarea  name="article" id="postcomment" rows="40" cols="40"> ... texte ...</textarea><br />
              <input type="submit" value="Envoyer" />
            </div>

     	</form>
       				 </article>
		                      
                    <?php $content = ob_get_clean();?>
<?php require ('view/BackEnd/template.php') ;
      