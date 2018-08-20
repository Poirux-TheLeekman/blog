<?php 

Class Comment {
    
    //Attributs
    private $_id,
    $_idarticle,
    $_datetime,
    $_author,
    $_postcomment;
    
    
    // constructeur - reçois un tableau
    public function __construct()
    {
        $this->hydrate();
        
    }
    
    // hydrate via tableau // array 
    public function hydrate(array $data)
    {
      
        foreach ($data as $key => $value)
        
        {
            
            // On récupère le nom du setter correspondant à l'attribut.
            
            $method = 'set'.ucfirst($key);
            
            
            
            // Si le setter correspondant existe.
            
            if (method_exists($this, $method))
            
            {
                
                // On appelle le setter.
                
                $this->$method($value);
                
            }
            
        }
        
        
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
            if ($id>O)
            {
                $this->_id=$id;
            }
            
        }
        public function setIdarticle($idarticle)
        {
            $articleid=(int)$idarticle;
            if ($idarticle>O)
            {
                $this->_idarticle=$idarticle;
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
        public function setAuthor($author)
        {
            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
            if (is_string($author))
            {
                $this->_author = $author;
            }
            else 'Pseudo non valide';
        }
        public function setPostcomment ($postcomment)
        {
            if (is_string($postcomment))
            {
                $this->_postcomment = $postcomment;
            }
            else 'contenu d\'article non valide';
        }
        
      
}



