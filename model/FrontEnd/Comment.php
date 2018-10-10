<?php 
require_once('model/Model.php');

use Leekman\Blog\Model\Model;

Class Comment extends Model{
    
    //Attributs
    private $_id,
    $_idarticle,
    $_datetime,
    $_author,
    $_postcomment,
    $_report,
    $_articletitle;
    
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
        public function report(){return $this ->_report;}
        public function articletitle(){return $this ->_articletitle;}
        
            
            
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
        
        {   $idarticle=(int)$idarticle;
            if ($idarticle>0)
            {
                $this->_idarticle=$idarticle;
            }
            else {
                throw new \Exception ('identifiant d\'article non valide');
                
            }
            
        }
        public function setDatetime($datetime){
               $datetime1=date('d/m/Y à H:m:s',strtotime($datetime));
           //  if (strptime($datetime1, '%d/%m/%Y %H:%M:%S')) 
            //{
                $this->_datetime = $datetime1;
            //}
            //else
            //   throw new \Exception( 'format de date non valide');
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
            else{
            throw new \Exception( 'contenu d\'article non valide');
            }
        }
        public function setReport ($report)
        {
            $report=(int)$report;
            
            //if ($report == 0 ||$report == 1)
            //{
                $this->_report = $report;
           // }
           // else {
             //   throw new \Exception('unrecognized report status');
           // }
        }
        public function setArticleTitle ($articletitle)
        {
            if (is_string($articletitle))
            {
                $this->_articletitle = $articletitle;
            }
            else{
                throw new \Exception( 'contenu d\'article non valide');
            }
        }
      
}



