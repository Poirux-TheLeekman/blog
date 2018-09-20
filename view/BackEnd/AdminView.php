<?php $title="Blog : Administration";
$headaddon= null;
session_start();

?>

<?php  ob_start();?>
     			    
       <aside> <a href="index.php?action=new">Ajouter un nouvel article</a></aside>
       <article>
       <h2> Articles :</h2>
       <hr>
       <h2> Commentaires :</h2>
							     		
       </article>
		                      
<?php $content = ob_get_clean();?>
<?php require ('view/FrontEnd/template.php') ;
      