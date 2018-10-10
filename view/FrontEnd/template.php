    <?php session_start();?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="public/style.css" />
        <?= $headaddon ?>
    </head>
        	          			    <?= 'Isadmin : '?><?=var_dump($_SESSION['IsAdmin'])?>
        	 						<?= '<hr>idarticles : '?><?=var_dump($_SESSION['idarticles'])?>
									<?= '<hr>logurl : '?><?=var_dump($_SESSION['logurl'])?>
									<?= '<hr>idcomments : '?><?=var_dump($_SESSION['idcomments'])?>
																		<?= '<hr>articletilte : '?><?=var_dump($GLOBALS)?>
									
									
        	          			    
        	 <div class="button"><a href="<?=$_SESSION['logurl']?>">	<?=$_SESSION['logbutton']?></a><?=$_SESSION['IsAdmin']?></div> 
    
    <header>
    	   
    	
	</header>
	
	<body>
            <?= $content ?>
       
    </body>
    <footer>
        <div id="footercontent">
           <!-- rafraichir la page -->
           <div class="button">  <a href="#" onclick="javascript:window.history.go(0)">rafraichir la page</a></div><hr>        
           <div class="button">  <a href="index.php">retour à l'accueil</a></div>
        </div>   
    </footer>
</html>     
        