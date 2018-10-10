<?php 
namespace Leekman\Blog\Model;
require_once ('model/FrontEnd/Comment.php');
require_once ('model/Manager.php');
Class CommentManager extends Manager
{
  
    //
    public function getcomments()
    {
        $comments=[];
        $db= $this->dbconnect();
        $commentsreq = $db->prepare('SELECT id, author, postcomment, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetime, report,idarticle  FROM comments ORDER BY id ASC');
        $commentsreq->execute(array($id));
        while ($commentsdata=$commentsreq->fetch()){
            $commentdata= new \Comment($commentsdata);
            $comments[]=$commentdata;
        }
        return $comments;
    }
    
    //-----------------------------------------------------------
    // add a comment to article identified by id
    public function addcomment ($articleid,$author,$postcomment)
    {
        $db= $this->dbconnect();
        $addcomment = $db->prepare('INSERT INTO comments(idarticle, author, postcomment, datetime) VALUES (:idarticle,:author, :postcontent,NOW())');
        $addcomment->execute(array('idarticle'=> $articleid , 'author' => $author, 'postcontent' => $postcomment));
        
    }
    
    // get the 20 last comment
    public function getlastcomments()
    {
        $lastcomments=[];
        $db= $this->dbconnect();
        $comments= $db->query('SELECT id, author, postcomment, idarticle, datetime,report FROM comments ORDER BY datetime DESC limit 5');
        foreach ($comments as $data){
            $comment=new \Comment($data);
            $lastcomments[]=$comment;
            
        }
  
        return $lastcomments;
    }
    
    // get comment identified by id
    public function getcomment($id)
    {
        $db= $this->dbconnect();
        $commentbyid = $db->prepare('SELECT id,author, postcomment, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetime,report  FROM comments WHERE id = ?');
        $commentbyid->execute(array($id));
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
        $commentsreq = $db->prepare('SELECT id, author, postcomment, datetime, report  FROM comments WHERE idarticle = ?');
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
    public function allcomments_id (){
        $listid_comments=[];
        $db= $this->dbconnect();
        $allcomments_id= $db->query('SELECT id FROM comments');
        while ($id=$allcomments_id->fetch()){
            $listid_comments[]=$id;
        }
        return $listid_comments;
    }
    public function updatereport ($id,$report){
        $db= $this->dbconnect();
        $updatereport = $db->PREPARE('UPDATE comments SET report=? WHERE id = ?');
        $updatereport->execute(array($report,$id));
        
    }
    public function getcommentsbyreport($report)
    {
        $comments=[];
        $db= $this->dbconnect();
        $commentsreq = $db->prepare('SELECT id, author, postcomment, DATE_FORMAT(datetime, \'%d/%m/%Y à %Hh%imin%ss\') AS datetime, idarticle  FROM comments where report=?');
        $commentsreq->execute(array($report));
        while ($commentsdata=$commentsreq->fetch()){
            $commentdata= new \Comment($commentsdata);
            $comments[]=$commentdata;
        }
        return $comments;
    }
    
}