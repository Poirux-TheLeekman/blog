<?php 
session_start();
require_once ('model/FrontEnd/CommentManager.php');
require_once ('model/FrontEnd/ArticleManager.php');



function adminindex(){                       
    $lastarticle=listlastarticle(); //last art
    $comments=listlastcomments();  
    listallcomments();//last 5 comments
    require_once ('controller/backEnd/BackEndcontroller.php');
    /*if (isset($_POST['statutarticles'])){
        $articles=listarticlesbystatut($statut);
        return $articles;
     //   require ('view/BackEnd/articlesView.php');
      //  require_once ('view/BackEnd/AdminView.php');
        
        
    }*/
    $allarticles=listallarticles();
  //  $articles=listarticlesbystatut($statut);
    // last five pulish articles 
    require_once ('view/BackEnd/AdminView.php');
    
      //  require ('view/BackEnd/AdminView.php');
        
        
    // idcomments();
    
}

function logoutcontrol(){
    if ($_SESSION['IsAdmin']===2){
        throw new Exception('hum,hum vous n\'êtes pas connecté.<br>Que faites vous là ?');
    }
    else {
        //require ('view/BackEnd/logout.php');
        makeuser(0);
        indexcontrol($_SESSION['IsAdmin']);
        require_once ('view/FrontEnd/articlesView.php');
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
    if ((isset($_POST['title'])) && (isset($_POST['article']))){
        if ($_POST['title'] !== 'Titre'){
            postarticle($_POST['title'],$_POST['article']);
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
    if ($statutcomments===2){
        $comments=listallcomments();
    }
    else 
        $comments=listcommentsbyarticlesbyreport($_SESSION['idarticles'], $statutcomments);
}
 //require ('view/BackEnd/CommentsView.php');


/*function listcomments() // get comments
{
    $commentManager= new Leekman\Blog\Model\CommentManager();
    $comments=$commentManager->getcomments();
    if ($comments === false){
        throw new Exception ('impossible d\'obtenir les commentaires!');
    }
    else{
        require ('view/FrontEnd/view.php');
    }
}*/