<?php 
session_start();
use Leekman\Blog\Model\AdminManager;
require_once ('model/BackEnd/AdminManager.php');
      




       
       
       
       //___________________________________
    // admin controller
    function verifAdmin($postlogin,$postpassword)
    {
        $admin= new AdminManager();
        $adminid=$admin->getUser(1);
    
        
        if($postlogin == $adminid->login() && password_verify($postpassword, $adminid->password()) === TRUE)
                {     
                    
                    makeuser(1);
                    
                    adminindex();                    
                }   
                else 
                {
                    throw new Exception('identifiant non reconnu');
                }
                
        }
        
        function makeuser($statut){
            $admin= new AdminManager();
            $adminid=$admin->getUser($statut);
            $_SESSION['logurl']=$adminid->logurl();
            $_SESSION['logbutton']=$adminid->logbutton();
            $_SESSION['IsAdmin']=$adminid->isadmin();
            if ($statut===1){
                $_POST['author']='Jean Forteroche';
                
            }
           
            
        }
 