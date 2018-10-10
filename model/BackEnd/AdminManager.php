<?php 
namespace Leekman\Blog\Model;


require_once ('model/BackEnd/Admin.php');
require_once ('model/Manager.php');

Class AdminManager extends Manager{
    
  
    
    public function getUser($id)
    {
        $db= $this->dbconnect();
        $admindb= $db->prepare('SELECT login,password, logurl,logbutton,isadmin FROM admin where id=?');
        $admindb->execute(array($id));
        while ( $admininfo=$admindb->fetch(\PDO::FETCH_ASSOC)){
        //foreach ($admindb as $admininfo){
            $admin= new Admin($admininfo);//}
        }
            return $admin;
    }
    
}