<?php 
session_start();

// articles controllers
function listid ($statut){
    $idarticles=[];
    $idcomments=[];
    $articlesManager= new Leekman\Blog\Model\ArticleManager();
    //$commentsManager= new Leekman\Blog\Model\CommentManager();
    if ($statut===3){
        $articles=$articlesManager->getarticles();
        foreach ($articles as $article){
            $idarticles[]=$article->id();
        }
        $_SESSION['idarticles']=$idarticles;
    }
    else {
        $articles=$articlesManager->getarticlesbystatut($statut);
        foreach ($articles as $article){
            $idarticles[]=$article->id();
        }
        $_SESSION['idarticles']=$idarticles;
    }
}
         
        
         
         
         
         
         
         function  listarticlesbystatut ($statut)
         {
             $idarticles=[];
             $articlesManager= new Leekman\Blog\Model\ArticleManager();
             if ($statut===3){
                 $articles=$articlesManager->getarticles();
             }
             else {
             $articles=$articlesManager->getarticlesbystatut($statut);
             }
             if ($articles === false){
                 throw new Exception ('impossible d\'obtenir les derniers articles!');
             }
             else {
                 
                 foreach ($articles as $article){
                     $idarticles[]=$article->id();
                 }
                 $_SESSION['idarticles']=$idarticles;
                 
                 if ($_SESSION['IsAdmin']===TRUE){
                     
                     require ('view/BackEnd/AdminView.php');
                     
                 }
                 else 
                 require ('view/FrontEnd/articlesView.php');
                     
             }
             
             
         }
         
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
                 require ('view/FrontEnd/articleView.php');
             }
         }
         
         function filtered_articles (array $articleslist,$statut){
             $filtered_articles=[];
             foreach ($articleslist as $article)  {
                 if ($article->Publish() === $statut){
                     $filtered_articles[]=$article;
                 }}
                 require ('view/FrontEnd/articlesView.php');
                 
         }