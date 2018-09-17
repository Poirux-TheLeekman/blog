<?php 
use Leekman\Blog\Model\Manager;


require_once ('model/FrontEnd/Manager.php');
Class AdminManager extends Manager{
    
    public function getAdmin()
    {
        $db= $this->dbconnect();
        $admindb= $db->query('SELECT login, password FROM admin');
        while ($admindb->fetch()){
            $adminlogin=$admindb['login'];
            $adminpassword=$admindb['password'];
        }
            
        return $adminlogin;
        return $adminpassword;
    }
        
    }