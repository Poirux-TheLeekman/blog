 <?php
 use Leekman\Blog\Model\AdminManager;
 require_once ('model/BackEnd/AdminManager.php');
 
 // admin controller
    function getAdmin($postlogin,$postpassword)
    {
        $admin= new AdminManager();
        $adminid=$admin->getAdminid();
    
        
        if($postlogin == $adminid->login() && password_verify($postpassword, $adminid->password()) === TRUE)
                {     
                    $_SESSION['IsAdmin']=TRUE;
                    $_SESSION['logbutton']='Déconnexion';
                    $_SESSION['logurl']='view/BackEnd/logout.php';
                    
                    
                }
                else 
                {
                    throw new Exception('identifiant non reconnu');
                }
                
        }