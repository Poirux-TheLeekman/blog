<?php 
namespace Leekman\Blog\Model;


require_once ('model/BackEnd/Admin.php');
require_once ('model/Manager.php');

Class AdminManager extends Manager{
    
    public function getAdmin()
    {
        $db= $this->dbconnect();
        $admindb= $db->query('SELECT login, password FROM admin');
        while ($admininfo= $admindb->fetch()){
            $adminid= new Admin($admininfo);}    
        return $adminid;
    }
        
    }