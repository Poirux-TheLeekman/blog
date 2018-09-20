<?php 
use Leekman\Blog\Model\AdminManager;
require_once ('model/BackEnd/AdminManager.php');

    
    function isAdmin($postlogin,$postpassword)
    {
        $admin= new AdminManager();
        
        $adminid=$admin->getAdmin();
        
            if($postlogin == $adminid->login() && $postpassword == $adminid->password())
                {     
                    $_SESSION['IsAdmin']=TRUE;
                    require ('view/BackEnd/AdminView.php');
                    
                }
                else 
                {
                    throw new Exception('identifiant non reconnu');
                }
                
        }
        
    
