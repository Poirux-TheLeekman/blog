<?php 
namespace Leekman\Blog\Model;
require_once ('model/FrontEnd/Comment.php');
require_once ('model/Manager.php');
Class CommentManager extends Manager
{
  
    
    // add a comment to article identified by id
    public function addcomment ($articleid,$author,$postcomment)
    {
        $db= $this->dbconnect();
        $addcomment = $db->prepare('INSERT INTO comments(idarticle, author, postcomment, datetime) VALUES (:idarticle,:author, :postcontent, NOW())');
        $addcomment->execute(array('idarticle'=> $articleid , 'author' => $author, 'postcontent' => $postcomment));
    }
    
    // get the 20 last comment
    public function getcomments()
    {
        $db= $this->dbconnect();
        $comments= $db->query('SELECT id, author, postcomment, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetimefr FROM comments ORDER BY id DESC LIMIT 0, 20');
        return $comments;
    }
    
    // get comment identified by id
    public function getcomment($postId)
    {
        $db= $this->dbconnect();
        $commentbyid = $db->prepare('SELECT id,author, postcomment, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetime  FROM comments WHERE id = ?');
        $commentbyid->execute(array($postId));
        while ($commentdata=$commentbyid->fetch()){
            $comment = new \Comment($commentdata);
        }
        
        return $comment;
    }
    //edit comment identified by id
    public function updcomment($postId,$author,$postcomment)
    {
        $db= $this->dbconnect();
        $comment = $db->PREPARE('UPDATE comments SET author=?, postcomment=?, datetime=NOW() WHERE id = ?');
        $comment->execute(array($author,$postcomment,$postId));
    }
    
    // get comments by identified by idarticle
    public function getarticlecomments($id)
    {
        $comments=[];
        $db= $this->dbconnect();
        $commentsreq = $db->prepare('SELECT id, author, postcomment, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetime  FROM comments WHERE idarticle = ?');
        $commentsreq->execute(array($id));
        while ($commentsdata=$commentsreq->fetch()){
            $commentdata= new \Comment($commentsdata);
            $comments[]=$commentdata;
        }
        return $comments;
    }
    // methode delete
    public function deleteComment(int $id){
        $delete = $this->connexion->prepare("DELETE FROM comments WHERE id=?");
        $delete->bindValue(1,$id,Manager::PARAM_INT);
        $delete->execute();
        // la suppression a fonctionnée
        return ($delete->rowCount())? true: false;
    }
}