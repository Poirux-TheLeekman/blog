<?php 
namespace Leekman\Blog\Model;


require_once ('model/BackEnd/Admin.php');
require_once ('model/Manager.php');

Class AdminManager extends Manager{
    
    public function makeuser (){
        $db= $this->dbconnect();
        $userdb= $db->query('SELECT login,password,logurl, logbutton,isadmin FROM admin where id=2');
         $user=new Admin($userdb);
        
        $_SESSION['logbutton']=$user->logbutton();
        $_SESSION['logurl']=$user->logurl();
        $_SESSION['IsAdmin']=$user->isadmin();
        
        
    }
        
    
    
    public function getAdmin()
    {
        $db= $this->dbconnect();
        $adminid= $db->query('SELECT login,password FROM admin where id=1');
          
        return $adminid;
    }
        
    }