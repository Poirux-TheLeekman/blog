<?php 
namespace Leekman\Blog\Model;


require_once ('model/FrontEnd/Article.php');
require_once ('model/Manager.php');
Class ArticleManager extends Manager
{
    
    // get the articles
    public function getarticles()
    {
        $articles=[];
        $db= $this->dbconnect();
        $articleslist = $db->query('SELECT id, title, content, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetime, publish FROM articles ORDER BY id ASC');
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
       // return $articleslist;
        
        while ($newarticle=$articleslist->fetch(\PDO::FETCH_ASSOC)){
            $article=new Article($newarticle);
            $articles[]=$article;
            
        }
        return $articles;
    }
    // get the last  article
    public function getlastarticle()
    {
        
        $db= $this->dbconnect();
        $getlastarticle = $db->query('SELECT id, title, content, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetime, publish from articles order by datetime DESC limit 0,1');
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        while ($newarticle=$getlastarticle->fetch(\PDO::FETCH_ASSOC)){
            $lastarticle=new Article($newarticle);
        }
        return $lastarticle;
       
    }
    // get article identified by statut
    public function getarticlesbystatut($statut){
        
        $db= $this->dbconnect();
        $getarticles = $db->prepare('SELECT id, title, content, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetime FROM articles WHERE publish=?');
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        
        $getarticles->execute(array ($statut));
        $articles=[];
        while ($newarticle=$getarticles->fetch(\PDO::FETCH_ASSOC)){
            $article=new Article($newarticle);
            $articles[]=$article;
        }
        return $articles;
    }
    // get article identified by idauthor
    public function getarticlebyid($id){
        
        $db= $this->dbconnect();
        $getarticle = $db->prepare('SELECT id, title, content, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetime FROM articles WHERE id=?');
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        
        $getarticle->execute(array ($id));
            while ($articledata=$getarticle->fetch()){
            $article=new Article($articledata);}
        return $article;
    }
    // methode delete
    public function deleteArticle(int $id){
        $delete = $this->connexion->prepare("DELETE FROM article WHERE id=?");
        $delete->bindValue(1,$id,Manager::PARAM_INT);
        $delete->execute();
        // la suppression a fonctionnée
        return ($delete->rowCount())? true: false;
    }
    public function addarticle()
    {
        
    }
}
