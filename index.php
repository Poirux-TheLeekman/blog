<?php 
session_start();
// call controllers    
require('controller/frontEnd/FrontEndcontroller.php');
require ('controller/backEnd/AdminController.php');

// define the default name and content for the forms
if (empty($_POST['author'])|| (empty($_POST['postcomment'])) ){
    $_POST['author'] = "votre pseudo" ;
    $_POST['postcomment'] ="votre message";
}
/////////////////
if (!isset($_SESSION['IsAdmin'])){
    $_SESSION['IsAdmin']=FALSE;
    $_SESSION['logbutton']='Connexion';
    $_SESSION['logurl']='index.php?action=login';
}
    
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
            
            case 'admin':{
                getAdmin($_POST['login'],$_POST['password']);
                if ($_SESSION['IsAdmin']===TRUE){
                    isadmin();
                }
                else {
                    throw new Exception('vous n\'êtes pas connecté.');
                    
                }                    
            }
            break;
            case 'login':{
                login();
                
            }
            break;
            case 'view':{
                if ((isset($_GET['postId']))&&((int) $_GET['postId']>0)){
                    if ($_SESSION['IsAdmin']===TRUE){
                        adminlistcomment($_GET['postId']);
                    }
                    else {
                        listcomment($_GET['postId']);
                    }
                    
                }
                elseif ((isset($_GET['article']))&&($_GET['article'] > 0)){
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
        
        listarticles();
    }
} catch (Exception $e) {
    $errorMessage=$e->getMessage();
    require('view/FrontEnd/errorView.php');
}



/*
switch ($_SESSION['IsAdmin']===true){
        case true :
           
       if ((isset($_GET['action']))){
           
                    if (($_GET['action'])==='new'){
                        require ('view/BackEnd/NewArticleView.php');
                    }
                    elseif (($_GET['action'])==='view_articles'){
                        Adminlistarticles();
                        require ('view/BackEnd/ArticlesView.php');
                    }
                    elseif (($_GET['action'])==='view_comments'){
                        Adminlistcomments();
                        require ('view/BackEnd/CommentsView.php');
                    }
                    
               
            }
            else {
                require ('view/BackEnd/AdminView.php');
                
            }
            break;
            
        case false :
            
            try {
            if (isset($_GET['action']))
            {
                if (($_GET['action'])=='new'){
                    
                    if ($_SESSION['IsAdmin']===TRUE){
                        require ('view/BackEnd/NewArticleView.php');
                        
                    }
                    else {
                        throw new Exception('vous n\'êtes pas authorisé à ajouter un article');
                    }
                    
                    
                }
                elseif (($_GET['action'])=='admin'){
                    
                    getAdmin($_POST['login'],$_POST['password']);
                    listarticles();
                    listcomments();
                    
                    
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
     
}*/
