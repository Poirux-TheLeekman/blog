    <?php session_start();?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="public/style.css" />
        <?= $headaddon ?>
    </head>
        	          			   
									
        	          			    
        	 <div class="button"><a href="<?=$_SESSION['logurl']?>">	<?=$_SESSION['logbutton']?></a></div> 
    			        	 <div> <h2>Billet simple pour l'Alaska</h2><h3>Espace Administration</h3></div>
    			
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>     
        