<?php 
require_once('model/Model.php');

use Leekman\Blog\Model\Model;

Class Comment extends Model{
    
    //Attributs
    private $_id,
    $_idarticle,
    $_datetime,
    $_author,
    $_postcomment;
    
    // constructeur - reçois un tableau
    public function __construct($data)
    {
        $this->hydrate($data);
        
    }
    

 
            
      //getters
        public function id(){return $this ->_id;}
        public function idarticle(){return $this ->_idarticle;}
        public function datetime(){return $this->_datetime;}
        public function author(){return $this ->_author;}
        public function postcomment(){return $this ->_postcomment;}
            
            
      //setters
        public function setId($id)
        {
            $id=(int)$id;
            if ($id>0)
            {
                $this->_id=$id;
            }
            else {
                throw new \Exception ('identifiant non valide');
                
            }
            
        }
        public function setIdarticle($idarticle)
        {
            $articleid=(int)$idarticle;
            if ($idarticle>O)
            {
                $this->_idarticle=$idarticle;
            }
            else {
                throw new \Exception ('identifiant d\'article non valide');
                
            }
            
        }
        public function setDatetime($datetime)
        {
            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
            if (strptime($datetime, "%d/%m/%Y")) 
            {
                $this->_datetime = $datetime;
            }
            else
               throw new \Exception( 'format de date non valide');
        }
        public function setAuthor($author)
        {
            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
            if (is_string($author))
            {
                $this->_author = $author;
            }
            else {
                throw new \Exception ('Pseudo non valide');
            }
        }
        public function setPostcomment ($postcomment)
        {
            if (is_string($postcomment))
            {
                $this->_postcomment = $postcomment;
            }
            throw new \Exception( 'contenu d\'article non valide');
        }
        
      
}



