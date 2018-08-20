<?php 

Class Article {
    
    //Attributs
    private $_id,
    $_datetime,
    $_title,
    $_content;
    
    
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
        public function datetime(){return $this->_datetime;}
        public function title(){return $this ->_title;}
        public function content(){return $this ->_content;}
            
            
      //setters
        public function setId($id)
        {
            $id=(int)$id;
            if ($id>O)
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
        public function setcontent ($content)
        {
            if (is_string($content))
            {
                $this->_content = $content;
            }
            else 'contenu d\'article non valide';
        }
}



