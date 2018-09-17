<?php 
namespace Leekman\Blog\Model;
require_once ('model/FrontEnd/Manager.php');
Class AdminManager extends Manager
{
 
 
    public function getAdmin()
    {
        $db= $this->dbconnect();
        $admin= $db->query('SELECT login, password FROM admin');
        return $admin;
    }
    
}