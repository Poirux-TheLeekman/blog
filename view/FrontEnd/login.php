<?php $title="identification";
$headaddon=null;?>

            <?php ob_start(); ?>
    
    	<form action="index.php?action=login" method="post">
            <p>
            <h2>Identifiez vous </h2>
              <label for="login">Login</label> : <input type="text" name="login" id="login" value="<?= $_POST['author'] ?>"/><br />
              <label for="password">Password</label> : <input type="password" name="password" id="password" /><br />

              <input type="submit" value="Envoyer" />
     	</form>     
      	                        <?php $content=ob_get_clean(); ?>
        <?php require ('view/FrontEnd/template.php') ;
      