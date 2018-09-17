<?php $title="identification"?>
            <?php ob_start(); ?>
    
    	<form action="index.php?action=admin" method="post">
            <p>
            <h2>Identifiez vous </h2>
              <label for="login">Login</label> : <input type="text" name="login" id="login" value="<?= $_POST['author'] ?>"/><br />
              <label for="password">Password</label> : <input type="text" name="password" id="password" /><br />

              <input type="submit" value="Envoyer" />
     	</form>     
      	                        <?php $content=ob_get_clean(); ?>
        <?php require ('view/FrontEnd/template.php') ;
      