    <?php session_start();?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="public/style.css" />
        <?= $headaddon ?>
    </head>
    
	<header>            <div class="button">  <a href="index.php?action=login">Connexion</a></div>
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
        