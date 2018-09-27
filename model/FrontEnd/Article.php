<?php 
namespace Leekman\Blog\Model;


require_once('model/Model.php');
Class Article extends Model{
    
    //Attributs
    private $_id,
    $_datetime,
    $_title,
    $_content,
    $_publish;
    
    
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
        public function publish(){return $this ->_publish;}
        
            
            
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
            else{
               throw new \Exception('format de date non valide');
            }
        }
        public function setTitle($title)
        {
            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
            if (is_string($title))
            {
                $this->_title = $title;
            }
            else {
                throw new \Exception('Titre non valide');
            }
        }
        public function setContent ($content)
        {
            if (is_string($content))
            {
                $this->_content = $content;
            }
            else {
                throw new \Exception('contenu d\'article non valide');
                
            }
                'contenu d\'article non valide';
        }
        public function setPublish ($publish)
        {
            $publish=(int)$publish;
            
            if ($publish == 0 ||$publish == 1)
            {
                $this->_publish = $publish;
            }
            else {
                throw new \Exception('unrecognized publication status');
            }
        }
}



