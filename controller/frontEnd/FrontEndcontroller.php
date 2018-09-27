<?php 
session_start();

require_once ('model/FrontEnd/CommentManager.php');
require_once ('model/FrontEnd/ArticleManager.php');

// comments controllers
        function listcomment($postId)  //get comment content by id
            {
                $commentManager = new Leekman\Blog\Model\CommentManager();
                $comment= $commentManager -> getcomment($postId);
                if ($comment === false){
                    throw new Exception ('impossible d\'obtenir le commentaire!');
                }
                else{
                    require ('view/FrontEnd/commentview.php');
                }
            }
            
        function listcomments() // get comments
            {
                $commentManager= new Leekman\Blog\Model\CommentManager();
                $comments=$commentManager->getcomments();
                if ($comments === false){
                    throw new Exception ('impossible d\'obtenir les commentaires!');
                }
                else{
                require ('view/FrontEnd/view.php');
                }
             }
        function editcomment($postId,$author,$postcomment)  // update comment selected by id
             {            
                 $commentManager= new Leekman\Blog\Model\CommentManager();
                 $affectedline=$commentManager ->updcomment($postId,$author,$postcomment);
                 if ($affectedline === false) {
                     // Gestion de l'erreur à l'arrache
                     throw new Exception ('Impossible de modifier le commentaire !');
                 }
                 else {
                     header('Location: index.php');
                 }
             }
             
        function postcomment($id,$author,$postcomment)   // add comment as new entry
         {
             $commentManager= new Leekman\Blog\Model\CommentManager();
             $affectedline= $commentManager-> addcomment($id,$author,$postcomment);
             if ($affectedline === false) {
                 // Gestion de l'erreur à l'arrache
                 throw new Exception ('Impossible d\'ajouter le commentaire !');
             }
             else {
                 header('Location: index.php');
                 ;
             }
         }
         function reportcomment($id){
             $commentManager= new Leekman\Blog\Model\CommentManager();
                 $currentcomment= $commentManager->getcomment($id);
                 if ($currentcomment->report()===1){
                     throw new Exception ('ce commentaire a déja été signalé, merci !');
                 }
                 else {
                     $update=$commentManager->updatereport($id,1);
                     header('Location: index.php');
                     
                 }
                 if ($update === FALSE){
                     throw new Exception ('commentaire inexistant !');
                 }
         }
         
    // articles controllers
    
         function  listarticles ()
         {
             $articlesManager= new Leekman\Blog\Model\ArticleManager();
             $articleslist=$articlesManager->getarticles();
             if ($articleslist === false){
                throw new Exception ('impossible d\'obtenir les derniers articles!');
             }
             else {
                   $statut=1;
                   filtered_articles($articleslist, $statut);
             }
                 
                 
         }
         function  listarticle ($id)
         {
             $articleManager= new Leekman\Blog\Model\ArticleManager();
             $article=$articleManager->getarticle($id);
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
         function login(){
             if ($_SESSION['IsAdmin']===TRUE){
                 throw new Exception('vous êtes deja connecté.');
                 $_SESSION['urlredir']='view/BackEnd/AdminView.php';
             }
             else {
                 require ('view/FrontEnd/login.php');
             }   
         }

