<?php 
session_start();
use Leekman\Blog\Model\AdminManager;
use Leekman\Blog\Model\CommentManager;
require_once ('model/BackEnd/AdminManager.php');
require_once ('model/FrontEnd/CommentManager.php');
require_once ('model/FrontEnd/ArticleManager.php');
       
    // admin controller
    function getAdmin($postlogin,$postpassword)
    {
        $admin= new AdminManager();
        $adminid=$admin->getAdmin();
    
        
        if($postlogin == $adminid->login() && password_verify($postpassword, $adminid->password()) === TRUE)
                {     
                    $_SESSION['IsAdmin']=TRUE;
                    $_SESSION['logbutton']='Déconnexion';
                    $_SESSION['logurl']='view/BackEnd/logout.php';
                    
                }
                else 
                {
                    throw new Exception('identifiant non reconnu');
                }
                
        }
        
        
        
        // comments controllers
        function adminlistcomment($postId)  //get comment content by id
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
        
        function adminlistcomments() // get comments
        {
            $commentManager= new Leekman\Blog\Model\CommentManager();
            $comments=$commentManager->getcomments();
            if ($comments === false){
                throw new Exception ('impossible d\'obtenir les commentaires!');
            }
            else{
                require ('view/backEnd/view.php');
            }
        }
        function admineditcomment($postId,$author,$postcomment)  // update comment selected by id
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
        
        function adminpostcomment($id,$author,$postcomment)   // add comment as new entry
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
        
        // articles controllers
       
        
        function  adminlistarticles ()
        {
            $articlesManager= new Leekman\Blog\Model\ArticleManager();
            $articleslist=$articlesManager->getarticles();
            if ($articleslist === false){
                throw new Exception ('impossible d\'obtenir les derniers articles!');
            }
            else {
                require ('view/BEnd/articlesView.php');
            }
        }
        function  adminlistarticle ($id)
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
        
        function newarticle (){
            require ('view/BackEnd/NewArticleView.php');           
        }
        function idarticles(){
            $idarticles=[];
            $articlesManager= new Leekman\Blog\Model\ArticleManager();
            $articles=$articlesManager->getarticles();
            if ($articles === false){
                throw new Exception ('impossible d\'obtenir les derniers articles!');
            }
            else {
                foreach ($articles as $article){
                    $idarticles[]=$article->id();
                }
                $_SESSION['idarticles']=$idarticles;
                
            }
            
        }
        function idcomments(){
            $idcomments=[];
            $commentsManager= new Leekman\Blog\Model\CommentManager();
            $commentslist=$commentManager->getcomment();
            if ($commentslist === false){
                throw new Exception ('impossible d\'obtenir les derniers articles!');
            }
            else {
                foreach ($commentslist as $comment){
                    $idcomments[]=$comment->id();
                }
                $_SESSION['idcomments']=$idcomments;
            }
            
        }
        
        function isadmin(){
            $idarticles=[];
            $titlesarticles=[];
            $idcomments=[];
            $lastcomments=new Leekman\Blog\Model\CommentManager();
            $comments=$lastcomments->getlastcomments();
            $articlesManager= new Leekman\Blog\Model\ArticleManager();
            $articles=$articlesManager->getarticles();
            $articleManager= new Leekman\Blog\Model\ArticleManager();
            $lastarticle=$articleManager->getlastarticle();
            if (($articles === false)|| ($lastarticle===false)){
                throw new Exception ('impossible d\'obtenir les articles!');
            }
            else {
                foreach ($articles as $article){
                    $idarticles[]=$article->id();
                }
                $_SESSION['idarticles']=$idarticles;
                require ('view/BackEnd/AdminView.php');
                
                
            }// idcomments();
            
        }
        
        function adminarticlesbystatut($statut)
        {
            if ($statut===1 || $statut===0){
                listarticlesbystatut($statut);
            }
            else {
                adminlistarticles ();
            }
        }
        
