<?php 
namespace Leekman\Blog\Model;


require_once('model/Model.php');
Class Article extends Model{
    
    //Attributs
    private $_id,
    $_datetime,
    $_title,
    $_content;
    
    
 // constructeur - reçois un tableau
 
    public function __construct($data)
    {
        $this->hydrate($data);
        
    }
            
      //getters
        public function id(){return $this ->_id;}
        public function datetime(){return $this->_datetime;}
        public function title(){return $this ->_title;}
        public function content(){return $this ->_content;}
            
            
      //setters
        public function setId($id)
        {
            $id=(int)$id;
            if ($id>0)
            {
                $this->_id=$id;
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
               echo 'format de date non valide';
        }
        public function setTitle($title)
        {
            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
            if (is_string($title))
            {
                $this->_title = $title;
            }
            else 'Titre non valide';
        }
        public function setContent ($content)
        {
            if (is_string($content))
            {
                $this->_content = $content;
            }
            else 'contenu d\'article non valide';
        }
}



