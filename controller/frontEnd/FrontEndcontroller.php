<?php 
session_start();
require_once ('model/BackEnd/AdminManager.php');

require_once ('controller/ArticleController.php');
require_once ('controller/CommentController.php');
require_once ('controller/backEnd/AdminController.php');
require_once ('controller/backEnd/BackEndcontroller.php');



//usercontrol
function indexcontrol($isadmin){
    if ($isadmin===1){
        adminindex();
    }
    else {
       // $lastarticle=listlastarticle(); //last art
       // $comments=listlastcomments();  //last 5 comments
       // require_once ('controller/backEnd/BackEndcontroller.php');
        
        $articles=listarticlesbystatut(1);
        listallcomments();     //allcommentfor$_SESSION
        
        //  require_once ('view/BackEnd/AdminView.php');
        require_once ('view/FrontEnd/articlesView.php');
    } 
  
  
    
}

function usercontrol(){
    
    if  (!isset($_SESSION['IsAdmin'])){
        $_SESSION['IsAdmin']=0;
    }
        makeuser($_SESSION['IsAdmin']);
        
}



function logincontrol(){
if ($_SESSION['IsAdmin']===1){
throw new Exception('vous êtes deja connecté.');
$_SESSION['urlredir']='view/BackEnd/AdminView.php';
}
elseif ((isset($_POST['login'])) || (isset($_POST['password']))){
verifAdmin($_POST['login'],$_POST['password']);
}
else {
require ('view/FrontEnd/login.php');
}   
}
  
function reportcontrol($id){
    if  (in_array($id, $_SESSION['idcomments'])){
        if (isset($_GET['R'])){
        reportcomment($id,$_GET['R']);
        }
        else {
            throw new Exception('Nbre de signalements inconnu');
        }
    }
    else {
        throw new Exception('ce commentaire n\'existe pas !');
    }
        
    
}

function viewcontrol(){
    $table=listarticle($_GET['article']);
    $article=$table[0];
    $comments=$table[1];
    if ($_SESSION['IsAdmin']===1){
        require_once ('view/BackEnd/articleView.php');
        
    }
    else     
    require_once ('view/FrontEnd/articleView.php');
}
         
         
         