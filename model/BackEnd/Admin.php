<?php 
namespace Leekman\Blog\Model;


require_once('model/Model.php');
Class Admin extends Model {
    
    //Attributs
    private $_login,
            $_password;
    
    
 // constructeur - reçois un tableau
 
    public function __construct( $data)
    {
        $this->hydrate($data);
        
    }
            
      //getters
        public function login(){return $this ->_login;}
        public function password(){return $this->_password;}
  
            
            
      //setters
  
        public function setLogin($login){
            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
            if (is_string($login))
            {
                $this->_login = $login;
            }
            else 'login non valide';
        }
        public function setPassword ($password){
            if (is_string($password))
            {
                $this->_password = $password;
            }
            else 'mot de passe non valide';
        }
    
}



