    <?php session_start();?>

<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8" /> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>
        <meta name="description" content="Le Blog de Jean Forteroche - Billet simple pour l'Alaska">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
   	  	 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        
        <link rel="stylesheet" href="public/style.css" />
        <?= $headaddon ?>
    </head>       	          			    
  <body id="page-top" class="container" data-spy="scroll" data-target=".navbar">
        <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" id="navigation">
                	<div class="navbar-header">
                     <ul class="nav navbar-nav">
                    	<li><a class="navbar-brand" href="index.php">Billet simple pour l'Alaska <i class="fa fa-book" aria-hidden="true"></i></a></li>
                		<li><a class="navbar-brand" href="index.php?action=view">Les chapitres</a> </li>
                		<li><a class="navbar-brand" href="index.php#lastarticle">Dernier chapitre</a> </li>
                		
                	</ul>	
                	</div>
               		 <div class="collapse navbar-collapse" id="navbar-collapse-target">
                   			 <ul class="nav navbar-nav navbar-right">
                    			 <li class="dropdown">
                               	 <a href="<?=$_SESSION['logurl']?>">
                                 <span class="glyphicon glyphicon-user"></span><?=$_SESSION['logbutton']?><b class="caret"></b></a></li>
                               
                   			</ul>
               		 </div>
        </nav>     
 <div class="row">	
     <?= $content ?> 
  </div>          
            
            
       
    <!-- Pied de page
    ================================================== -->
    <footer class="col-xs-12 text-center">
      <div class="row">
      <a class="btn btn-default" href="#"><i class="fa fa-twitter fa-2x"></i></a>
      <a class="btn btn-default" href="#"><i class="fa fa-facebook fa-2x"></i></a>
      <a class="btn btn-default" href="#"><i class="fa fa-google-plus fa-2x"></i></a>
      <a class="btn btn-default" href="#"><i class="fa fa-flickr fa-2x"></i></a>
      <a class="btn btn-default" href="#"><i class="fa fa-spotify fa-2x"></i></a>
      </div><br />
      <div class="row">
      <a href="index.php"><button type="button" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-home"></span> Accueil
        </button></a></div>
      </div>   
    </footer>

</body>
  
</html>     
        