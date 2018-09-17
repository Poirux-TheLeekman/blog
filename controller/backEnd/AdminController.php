<?php 
require_once ('model/backEnd/AdminManager.php');

Class AdminController extends AdminManager
{
    public function isAdmin($postlogin,$postpasswrd)
    {
        $admin= new AdminManager();
        
        $admin->getAdmin();
            if($postlogin == $adminlogin || $postpasswrd ==$adminpassword)
                {     
                    require ('view/FrontEnd/AdminView.php');
                    
                }
                else 
                {
                    throw new Exception('identifiant non reconnu');
                }
                
        }
        
    }
