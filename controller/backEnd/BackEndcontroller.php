<?php 
require_once ('model/FrontEnd/CommentManager.php');
require_once ('model/FrontEnd/ArticleManager.php');

include ('controlleur/frontEnd/FrontEndController.php');
function adminarticlesid(){
    $articlesManager= new Leekman\Blog\Model\ArticleManager();
    $adminarticlesid=$articlesManager->admingetarticlesid();
    if ($adminarticlesid === false){
            throw new Exception ('impossible d\'obtenir la liste id!');
    }
 
}


function admingetarticles(){
            $articlesManager= new Leekman\Blog\Model\ArticleManager();
            $articleslist=$articlesManager->admingetarticles();
            if ($articleslist === false){
                throw new Exception ('impossible d\'obtenir les derniers articles!');
            }
            else {
                $filtered_articles=[];
                
                foreach ($articleslist as $article)  {
                    $filtered_articles[]=$article;
                }
                require ('view/BackEnd/AdminView.php');
                
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