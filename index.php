<?php
session_start();
// call controllers
require_once ('controller/frontEnd/FrontEndcontroller.php');
require_once  ('controller/backEnd/AdminController.php');
require_once ('controller/backEnd/BackEndcontroller.php');


// define the default name and content for the forms
if (empty($_POST['author'])|| (empty($_POST['postcomment'])) ){
    $_POST['author'] = "votre pseudo" ;
    $_POST['postcomment'] ="votre message";
}


try {
    usercontrol();
    if (isset($_GET['action'])){
        switch ($_GET['action']){
            case 'login':{
                logincontrol();
                
            }
            break;
            case 'logout':{
                logoutcontrol();
                
            }
            break;
            case 'new':{
                if ($_SESSION['IsAdmin']===1){
                    newarticlecontrol();
                }
                else {
                    throw new Exception('vous n\'êtes pas authorisé à ajouter un article');
                    
                }
                
            }
            break;
            case 'report':{
                if (isset($_GET['id'])){
                    reportcontrol($_GET['id']);
                }
                else {
                throw new Exception('necessite un commentaire')   ; 
                }
            }
            break;
            case 'comment':{
                if (isset($_GET['del']) && ($_SESSION['IsAdmin']===1)){
                    delcontrol($_GET['del']);
                    
                }
                
              
                    
            elseif(isset($_GET['article'])){
                if($_POST['author'] === "votre pseudo"){
                    throw new Exception('veuillez entrer un pseudo');
                    
                }
                    postcomment($_GET['article'],$_POST['author'],$_POST['postcomment']);
             }
           }
           break;
            case 'edit':{
                if ($_SESSION['IsAdmin']===1){
                    editcontrol();
                    
                }
                else 
                    throw new Exception('action non authorisée');
                    
            }
            break;
            case 'view':{
                if (isset($_POST['statutarticles']) )
                {

                    adminarticlesbystatut($_POST['statutarticles']);
                    
                }
                elseif (isset($_POST['statutcomments']) )
                {
                    
                    commentsbyreport($_POST['statutcomments']);
                    
                }
                elseif ((isset($_POST['commentsarticle']))&& in_array($_POST['commentsarticle'], $_SESSION['idarticles'])){
                    if ($_SESSION['IsAdmin']===1){
                        commentsbyarticlecontrol($_POST['commentsarticle']);
                    }
                }
                elseif ((isset($_GET['article']))&& in_array($_GET['article'], $_SESSION['idarticles']))
                {
                  
                        viewcontrol($_GET['article']);
                }
              
                else {
                    throw new Exception('identifiant non valide');
                }
                
            }
            break;
            case 'delete':
                deletecontrol();
            
          break;
            
        }            
     }
     else {
         
    indexcontrol($_SESSION['IsAdmin']);
    }
    
}

    
 catch (Exception $e) {
    $errorMessage=$e->getMessage();
    require('view/FrontEnd/errorView.php');
}


