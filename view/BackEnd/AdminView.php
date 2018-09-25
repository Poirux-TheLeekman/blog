<?php $title="Blog : Administration";
$headaddon= null;
session_start();

?>

<?php  ob_start();?>
     			    
       <aside> <a href="index.php?action=new">Ajouter un nouvel article</a></aside>
       <article>
       <h2> Articles :</h2>
     	<a href="index.php?action=view_articles">voir tous les articles</a>
                             
       <hr><h2> Commentaires :</h2>
		     <a href="index.php?action=view_comments">voir tous les commentaires</a>				     		
       </article>
		                      
<?php $content = ob_get_clean();?>
<?php require ('view/FrontEnd/template.php') ;
      