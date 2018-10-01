<?php 
namespace Leekman\Blog\Model;


require_once('model/Model.php');
Class Admin extends Model {
    
    //Attributs
    private $_login,
            $_password,
            $_logurl,
            $_logbutton,
            $_isadmin;
            
    
    
 // constructeur - reçois un tableau
 
            public function __construct($data )
    {
        $this->hydrate($data);
        
    }
            
      //getters
        public function login(){return $this ->_login;}
        public function password(){return $this->_password;}
        public function logurl(){return $this->_logurl;}
        public function logbutton(){return $this->_logbutton;}
        public function isadmin(){return $this->_isadmin;}
        
        
        
  
            
            
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
        public function setLogurl($logurl){
            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
            if (is_string($logurl))
            {
                $this->_logurl = $logurl;
            }
            else 'logurl non valide';
        }
        public function setLogbutton($logbutton){
            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
            if (is_string($logbutton))
            {
                $this->_logbutton = $logbutton;
            }
            else 'logbutton non valide';
        }
        public function setIsadmin($isadmin){
            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
     
                $this->_isadmin = $isadmin;
           
        }



}