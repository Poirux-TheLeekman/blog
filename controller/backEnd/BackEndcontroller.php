<?php 
require_once ('model/FrontEnd/CommentManager.php');
require_once ('model/FrontEnd/ArticleManager.php');

//include ('controller/frontEnd/FrontEndcontroller.php');
function adminindex($statut){
    isadmin();
    listarticlesbystatut($statut);
    
    
}

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

/*
function listcomments() // get comments
{
    $commentManager= new Leekman\Blog\Model\CommentManager();
    $comments=$commentManager->getcomments();
    if ($comments === false){
        throw new Exception ('impossible d\'obtenir les commentaires!');
    }
    else{            adminindex();
        
        require ('view/FrontEnd/view.php');
    }
}*/
function addarticlecontrol (){
    if(isset($_POST['title']) && isset($_POST['postarticle'])){
    addarticle($_POST['title'],$_POST['postarticle'],$_POST['statut']);
    }
    else {
        throw new Exception('Veuillez definir un titre et un contenu pour créer un nouvel article');
    }
}
    
    