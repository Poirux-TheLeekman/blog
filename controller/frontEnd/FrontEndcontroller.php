<?php 
session_start();

require_once ('model/FrontEnd/CommentManager.php');
require_once ('model/FrontEnd/ArticleManager.php');
require_once ('controller/ArticleController.php');
require_once ('controller/CommentController.php');


//
         
 
         function login(){
             if ($_SESSION['IsAdmin']===TRUE){
                 throw new Exception('vous êtes deja connecté.');
                 $_SESSION['urlredir']='view/BackEnd/AdminView.php';
             }
             else {
                 require ('view/FrontEnd/login.php');
             }   
         }
        
         function index(){
             $statut=1;
             listarticlesbystatut($statut);   
         }
