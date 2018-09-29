<?php 
session_start();

// articles controllers
    
         function  listarticlesbystatut ($statut)
         {
             $idarticles=[];
             $articlesManager= new Leekman\Blog\Model\ArticleManager();
             $listarticlesbystatut=$articlesManager->getarticlesbystatut($statut);
             if ($listarticlesbystatut === false){
                 throw new Exception ('impossible d\'obtenir les derniers articles!');
             }
             else {
                 
                 foreach ($listarticlesbystatut as $article){
                     $idarticles[]=$article->id();
                 }
                 $_SESSION['idarticles']=$idarticles;
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