<?php
session_start();
// call controllers
require_once ('controller/frontEnd/FrontEndcontroller.php');
require_once  ('controller/backEnd/AdminController.php');

// define the default name and content for the forms
if (empty($_POST['author'])|| (empty($_POST['postcomment'])) ){
    $_POST['author'] = "votre pseudo" ;
    $_POST['postcomment'] ="votre message";
}


try {
    //$_SESSION['IsAdmin']=0;
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
                if ($_SESSION['IsAdmin']===1){
                    $_POST['author']='Jean Forteroche';
                    
                    if(($_POST['postcomment'] !="votre message")){
                        postcomment($_GET['article'],$_POST['author'],$_POST['postcomment']);
                    }
                    else {
                        throw new Exception('veuillez renseigner le  champ commentaire');
                    }
                    adminlistcomments();
                }
                else {
                    if(($_POST['author'] != "votre pseudo" || $_POST['postcomment'] !="votre message")){
                        postcomment($_GET['article'],$_POST['author'],$_POST['postcomment']);
                    }
                    else {
                        throw new Exception('veuillez renseigner le formulaire');
                    }
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
                if (isset($_POST['statutcomments']) )
                {
                    
                    commentsbyreport($_POST['statutcomments']);
                    
                }
                elseif ((isset($_GET['postId']))&&((int) $_GET['postId']>0)){
                    if ($_SESSION['IsAdmin']===1){
                        adminlistcomment($_GET['postId']);
                    }
                    else {
                        listcomment($_GET['postId']);
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
            case 'delete':{
                if ($_SESSION['IsAdmin']===1){
                    deletecontrol();
                }
                else 
                    throw new Exception('Action non authorisée');
            }
            break;
            
        }            
     }
     else {
         
    indexcontrol($_SESSION['IsAdmin']);
    }
    
    
    
                
    }
    //require('view/BackEnd/AdminView.php');
    
   // require('view/FrontEnd/articlesView.php');
    
    
 catch (Exception $e) {
    $errorMessage=$e->getMessage();
    require('view/FrontEnd/errorView.php');
}



/*////////////////
//usercontrol();

try {
    if  (!isset($_SESSION['IsAdmin'])){
        $_SESSION['IsAdmin']=2;
    }
    makeuser($_SESSION['IsAdmin']);
    
    if ((isset($_GET['action']))){
        switch ($_GET['action']){
            
            case 'new':{
                if ($_SESSION['IsAdmin']===1){
                    newarticle();
                }
                else {
                    throw new Exception('vous n\'êtes pas authorisé à ajouter un article');
                    
                }
            }
            break;
            case 'login':{
                logincontrol();
                
            }
            case 'logout':{
                logoutcontrol();
                
            }
            break;
            case 'view':{
                if (isset($_POST['statutarticles']) )
                {
                    $statut=$_POST['statutarticles'];
                    adminarticlesbystatut($statut);
                    ;
                }
                elseif ((isset($_GET['postId']))&&((int) $_GET['postId']>0)){
                    if ($_SESSION['IsAdmin']===TRUE){
                        adminlistcomment($_GET['postId']);
                    }
                    else {
                        listcomment($_GET['postId']);
                    }
                }
                elseif ((isset($_GET['article']))|| in_array($_GET['article'], $_SESSION['idarticles']))
                {
                    if ($_SESSION['IsAdmin']===TRUE){
                        adminlistarticle($_GET['article']);
                    }
                    else {
                        listarticle($_GET['article']);
                    }
                }
                else {
                    throw new Exception('identifiant non valide');
                }
            }
            break;
            case 'edit':{
                if ($_SESSION['IsAdmin']===TRUE){
                    if ((isset($_GET['article']))&&((int) $_GET['article']>0)){
                        if(($_POST['author'] != "votre pseudo" || $_POST['postcomment'] !="votre message")){
                            addarticle($_GET['postId'],$_POST['author'],$_POST['postcomment']);
                        }
                        else {
                            throw new Exception('numéro d\'article invalide');
                        }
                    }
                    
                }
                else {
                    throw new Exception('accès interdit, veuillez vous identifez pour effectuer une modification');
                }
            }
            break;
            case 'addcomment':{
                if ($_SESSION['IsAdmin']===TRUE){
                    $_POST['author']='Jean Forteroche';
                    if(($_POST['postcomment'] !="votre message")){
                        postcomment($_GET['article'],$_POST['author'],$_POST['postcomment']);
                    }
                    else {
                        throw new Exception('veuillez renseigner le  champ commentaire');
                    }
                    adminlistcomments();
                }
                else {
                    if(($_POST['author'] != "votre pseudo" || $_POST['postcomment'] !="votre message")){
                        postcomment($_GET['article'],$_POST['author'],$_POST['postcomment']);
                    }
                    else {
                        throw new Exception('veuillez renseigner le formulaire');
                    }
                }
                listcomments();
            }
            break;
            case 'report':{
                if ((isset($_GET['id']))&&((int) $_GET['id']>0)){
                    reportcomment($_GET['id']);
                }
                else {
                    throw new Exception('N° de commentaire invalide');
                    
                }
            }
            break;
            case '':{
                throw new Exception('action interdite');
            }
            
            
        } //end switch
    }  //end  if
    else {
        //indexcontrol();
        if ($_SESSION['IsAdmin']===1){
            require_once ('controller/backEnd/BackEndcontroller.php');
            $statut=0;
            adminindex($statut);
        }
        elseif (($_SESSION['IsAdmin']===2)||(!isset($_SESSION['IsAdmin']))){
            $statut=1;
            indexcontrol($statut);
            
        }
        
        
    }
} catch (Exception $e) {
    $errorMessage=$e->getMessage();
    require('view/FrontEnd/errorView.php');
}*/
