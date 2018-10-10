<?php 
use Leekman\Blog\Model\AdminManager;
use Leekman\Blog\Model\ArticleManager;

session_start();

// articles controllers
function listlastarticle (){
    
    $articleManager= new Leekman\Blog\Model\ArticleManager();
    $lastarticle=$articleManager->getlastarticle();
  
        return $lastarticle;
}


function  listarticlesbystatut ($statut)
{
    require_once ('controller/backEnd/AdminController.php');
    
    $idarticles=[];
    $articlesManager= new Leekman\Blog\Model\ArticleManager();
    $articles=$articlesManager->getarticlesbystatut($statut);
    if ($articles === false){
        throw new Exception ('impossible d\'obtenir les derniers articles!');
    }
    else {
        
        foreach ($articles as $article){
            $idarticles[]=$article->id();
        }
        $_SESSION['idarticles']=$idarticles;
        return $articles;
        
    }
    
    
}
function listallarticles(){
    $articlesManager= new Leekman\Blog\Model\ArticleManager();
    $articles=$articlesManager->getarticles();
    if (($articles === false)|| ($lastarticle===false)){
        throw new Exception ('impossible d\'obtenir les articles!');
    }
    else {
        foreach ($articles as $article){
            $idarticles[]=$article->id();
        }
        $_SESSION['idarticles']=$idarticles;
        return $articles;
        
        
    }// idcomments();
    
}

function postarticle($title,$content){
    $allarticles=listallarticles();
    foreach ($allarticles as $article){
        $titlelist[]=$article->title();
    }
        if (in_array($title,$titlelist)){
            throw new Exception('Erreur : Ce titre existe deja');
            
        }
        else {
            $articlesManager= new Leekman\Blog\Model\ArticleManager();
            $new=$articlesManager->addarticle($title,$content);
            if ($new === true){
                header('location:index.php');
            }
            else
                throw new Exception('erreur ');
        } 
    
}
function editarticle($id){
        $manager=new ArticleManager();
        $edit=$manager->updatearticle($id,$_POST['title'],$_POST['content'],$_POST['publish']);
        if ($edit===1){
            header('location:index.php');
        }
        else 
            throw new Exception('erreur');
    
}



//------------------------------------------------
      
         
         function  listarticle ($id)
         {
             $articleManager= new Leekman\Blog\Model\ArticleManager();
             $article=$articleManager->getarticlebyid($id);
             $commentslist= new Leekman\Blog\Model\CommentManager();
             $comments= $commentslist -> getarticlecomments($id);
             
             if ($article === false){
                 throw new Exception ('impossible d\'obtenir les derniers articles!');
             }
             else{
                 return (array($article,$comments));
             }
         }
         
         function deleteArticle($id){
             $action=new ArticleManager();
             $del=$action->delete($id);
             if ($del===TRUE){
                 throw new Exception('Article Supprimer' );
                 
             }
             else
                 throw new Exception('hum hum' );
                 
         }
         
         
         