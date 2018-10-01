<?php 
session_start();
// call controllers    
require ('controller/controller.php');
require('controller/frontEnd/FrontEndcontroller.php');
require ('controller/backEnd/AdminController.php');


/////////////////
usercontrol();

    
    ///////////////////
    
try { 
    
        
    if ((isset($_GET['action']))){
        switch ($_GET['action']){
           
            case 'new':{
                if ($_SESSION['IsAdmin']===TRUE){
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
            break;
            case 'view':{
                viewcontrol();
               
            }
            break;
   
            
            case 'edit':{
                        if(!isset($_GET['article'])){
                            if ($_SESSION['IsAdmin']===TRUE){
                                //require_once ('controller/fackEnd/BackEndcontroller.php');;
                                addarticlecontrol($_POST['title'],$_POST['postarticle'],$_POST['statut']);
                                
                            }
                             else {
                             throw new Exception('accès interdit, veuillez vous identifez pour effectuer une modification');
                             }
                        }
                        else 
                        {
                         ;        
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
         indexcontrol();
       

    }
} catch (Exception $e) {
    $errorMessage=$e->getMessage();
    require('view/FrontEnd/errorView.php');
}

