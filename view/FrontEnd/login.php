<?php $title="identification";
$headaddon=null;?>

            <?php ob_start(); ?>
    
    	<form action="index.php?action=login" method="post">
    	  <div class="col-xs-12 text-center">
            <h2>Identifiez vous </h2><hr>
            <div class="row">
              <label for="login" class="col-sm-4 text-right">Login</label> : <input class="col-xs-4" type="text" name="login" id="login" value="<?= $_POST['author'] ?>"/>
            </div>
            <div class="row">  
              <label for="password" class="col-sm-4 text-right">Password</label> : <input class="col-xs-4" type="password" name="password" id="password" />
			</div><br />
              <input type="submit" value="Envoyer" />
          </div>
     	</form>     
      	                        <?php $content=ob_get_clean(); ?>
        <?php require ('view/FrontEnd/template.php') ;
      