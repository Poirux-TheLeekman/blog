<?php 
session_start();
require_once ('controller/ArticleController.php');
require_once ('controller/CommentController.php');





function adminindex(){                       
    $lastarticle=listlastarticle(); //last art
    $comments=listlastcomments();  
    listallcomments();//last 5 comments

    $allarticles=listallarticles();

    require_once ('view/BackEnd/AdminView.php');

    
}

function logoutcontrol(){
    if ($_SESSION['IsAdmin']===0){
        throw new Exception('hum,hum vous n\'êtes pas connecté.<br>Que faites vous là ?');
    }
    else {
  
        makeuser(0);
        indexcontrol($_SESSION['IsAdmin']);
    }
}
function adminarticlesbystatut($statut)
{
    if ($statut==='1' || $statut==='0'){
        $articles=listarticlesbystatut($statut);
        if ($statut==='1'){
        $statutarticles='publiés';
        }
        else
        $statutarticles='non publiés';       
    }
    else {
        $articles=listallarticles();
        $statutarticles='tous';
        
    }
    require_once ('view/BackEnd/articlesView.php');
}
function  adminlistarticle ($id)
{
    $articleManager= new Leekman\Blog\Model\ArticleManager();
    $article=$articleManager->getarticlebyid($id);
    $commentslist= new Leekman\Blog\Model\CommentManager();
    $comments= $commentslist -> getarticlecomments($id);
    
    if ($article === false){
        throw new Exception ('impossible d\'obtenir les derniers articles!');
    }
    else{
        require ('view/BackEnd/articleView.php');
    }
}
function newarticlecontrol (){
    if ((isset($_POST['title'])) && (isset($_POST['article']))&&(isset($_POST['publish']))){
        if ($_POST['title'] !== 'Titre'){
            $publish=(int)$_POST['publish'];
            postarticle($_POST['title'],$_POST['article'],$publish);
        }
        else 
            throw new Exception('veuillez entrer votre texte');
    }
    require ('view/BackEnd/NewArticleView.php');
}
function editcontrol(){
    if ((isset($_GET['article'])) && in_array($_GET['article'], $_SESSION['idarticles'])){
        if ((isset($_POST['title']))&& isset($_POST['content']) && isset($_POST['publish'])){
            editarticle((int)$_GET['article'],$_POST['title'], $_POST['content'],(int)$_POST['publish']);
            
        }
        else
        {
            $table=listarticle($_GET['article']);
            $article=$table[0];
            require_once ('view/BackEnd/articleEdit.php');
        }
    }
    else
        Throw new Exception('article invalide');

}
function deletecontrol(){
    if ((isset($_GET['article']))&& in_array($_GET['article'], $_SESSION['idarticles'])){
        deleteArticle($_GET['article']);
        
            
    }
    throw new Exception('cet article n\'existe pas' );
}
function delcontrol($id){
    if ( in_array($id, $_SESSION['idcomments'])){
        deleteComment($id);
        
        
    }
    throw new Exception('cet article n\'existe pas' );
}

//-------------------------------------------------------------
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
function commentsbyreport($statutcomments){
    if ((int)$statutcomments===2){
        $title='Tous les commentaires';
        $comments=listallcomments();
       
    }
    else {
        if ((int)$statutcomments===0){
            $title='Commentaires non signalés';
        }else {
            $title='Commentaires  signalés';
                
        }
        $comments=listcommentsbyreport($statutcomments);
    }
        
    
    require_once ('view/BackEnd/CommentsView.php');
    
}

function  commentsbyarticlecontrol($id){
    $comments=listcommentsbyarticle($id);
    $title='Commentaires de l\'article '.$id;
    
    require ('view/BackEnd/CommentsView.php');
    
    
}

