<?php 
namespace Leekman\Blog\Model;


require_once ('model/FrontEnd/Article.php');
require_once ('model/Manager.php');
Class ArticleManager extends Manager
{
    
    // get the last 5 articles
    public function getarticles()
    {
        $articles=[];
        $db= $this->dbconnect();
        $articleslist = $db->query('SELECT id, title, content, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetime FROM articles ORDER BY id ASC LIMIT 0, 5');
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
       // return $articleslist;
        
        while ($newarticle=$articleslist->fetch(\PDO::FETCH_ASSOC)){
            $article=new Article($newarticle);
            $articles[]=$article;
            
        }
        return $articles;
    }
    // get article identified by idauthor
    public function getarticle($id){
        
        $db= $this->dbconnect();
        $article = $db->prepare('SELECT title, content, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetime FROM articles WHERE id=?');
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        $article->execute(array($id));
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
}
