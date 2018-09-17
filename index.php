<?php 

require('controller/frontEnd/FrontEndcontroller.php');
require ('controller/backEnd/AdminController.php');
// define the default name and content for the forms
if (empty($_POST['author'])|| (empty($_POST['postcomment'])) ){
    $_POST['author'] = "votre pseudo" ;
    $_POST['postcomment'] ="votre message";
}
// router 
try {
    if (isset($_GET['action']))  
    {
        if (($_GET['action'])=='admin'){
        $admin= new AdminController($_POST['login'],$_POST['password']);    
      }

                elseif (($_GET['action'])=='login'){
                require ('view/FrontEnd/login.php');
                
           }
                elseif (($_GET['action'])=='view')
                    if ((isset($_GET['postId']))&&((int) $_GET['postId']>0)){                    
                        listcomment($_GET['postId']);
                    }    
                    elseif ((isset($_GET['article']))&&($_GET['article'] > 0)){
                        listarticle($_GET['article']);
                    }
                    
                        else {
                            throw new Exception('identifiant non valide');
                        }
                }
                elseif (($_GET['action'])=='edit'){
                    if ((isset($_GET['postId']))&&((int) $_GET['postId']>0)){
                        if(($_POST['author'] != "votre pseudo" || $_POST['postcomment'] !="votre message")){
                            editcomment($_GET['postId'],$_POST['author'],$_POST['postcomment']);
                        }
                        else {
                            throw new Exception('veuillez renseigner le formulaire');
                        }
                    }
                    else {
                        throw new Exception('identifiant non valide');
                    }
                }   
                elseif (($_GET['action'])=='addcomment'){
                    if(($_POST['author'] != "votre pseudo" || $_POST['postcomment'] !="votre message")){
                        postcomment($_GET['article'],$_POST['author'],$_POST['postcomment']);
                     
                    }
                    else {
                        throw new Exception('veuillez renseigner le formulaire');
                    }
                    listcomments();
                    
                 }
                 
            
            else {
                  listarticles();
                  
            }
     
}
catch (Exception $e) {
    $errorMessage=$e->getMessage();
    require('view/FrontEnd/errorView.php');
    
}