<?php 
use Leekman\Blog\Model\CommentManager;

session_start();

function listlastcomments(){
    
    $lastcomments=new Leekman\Blog\Model\CommentManager();
    $comments=$lastcomments->getlastcomments();
    // $lastarticle=$articleManager->getlastarticle();
    if ($comments === false){
        throw new Exception ('impossible d\'obtenir les commentaires!');
    }
    return $comments;
    
}

function listallcomments(){
    $idcomments=[];
    $commentmanager=new Leekman\Blog\Model\CommentManager();
    $comments=$commentmanager->getcomments();
  
    if ($comments === false){
        throw new Exception ('impossible d\'obtenir les commentaires!');
    }
    else {
        foreach ($comments as $comment){
            $idcomments[]=(int)$comment->id();
        }
        $_SESSION['idcomments']=$idcomments;
        return $comments;
    }
}
function listcommentsbyarticles($articles){
    $comments=[];
    $allcomments=listallcomments();
    foreach ($allcomments as $comment){
        if (in_array($comment->idarticle(),$articles)){
            $idcomments[]=(int)$comment->id();
            $comments[]=$comment;
        }
        else {
            throw new Exception('n\'eŝt pas dasn le tablo');
        }
    }
    $_SESSION['idcomments']=$idcomments;
    return $comments;
    
}
function listcommentsbyarticle($article) // get comments
{
    $comments=[];
    $commentmanager=new CommentManager();
    $comments=$commentmanager->getarticlecomments($article);
  /*  $comments=listallcomments();
    foreach ($allcomments as $comment){
           ;
                if ((int)$comment->idarticle()===$article){
                $comments[]=$comment;
                }
                
     }*/
      
    return $comments;
}
function listcommentsbyreport($report) // get comments
{
    $comments=[];
    $allcomments=listallcomments();
    if ((int)$report===0){
        foreach ($allcomments as $comment){
            if ((int)$comment->report()===0){
                $comments[]=$comment;
            }
        }
    }
    else {
        foreach ($allcomments as $comment){
            if ((int)$comment->report()!==0){
                $comments[]=$comment;
            }
        }
    }
    return $comments;
    
}
function deleteComment($id){
    $action=new CommentManager();
    $del=$action->delete($id);
    if ($del===TRUE){
        throw new Exception('Commentaire Supprimé' );
        
    }
    else
        throw new Exception('hum hum' );
        
}


//-------------------------------------------
// comments controllers
function listcomment($postId)  //get comment content by id
{
    $commentManager = new Leekman\Blog\Model\CommentManager();
    $comment= $commentManager -> getcomment($postId);
    if ($comment === false){
        throw new Exception ('impossible d\'obtenir le commentaire!');
    }
    else{
        require ('view/FrontEnd/commentview.php');
    }
}


function editcomment($postId,$author,$postcomment)  // update comment selected by id
{
    $commentManager= new Leekman\Blog\Model\CommentManager();
    $affectedline=$commentManager ->updcomment($postId,$author,$postcomment);
    if ($affectedline === false) {
        // Gestion de l'erreur à l'arrache
        throw new Exception ('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php');
    }
}

function postcomment($id,$author,$postcomment)   // add comment as new entry
{   if($_POST['postcomment'] ==="votre message") {
    throw new ErrorException('veuillez saisir votre commentaire');
    }
    elseif (!in_array($id,$_SESSION['idarticles'])){
        throw new ErrorException(' ajout de commentaire impossible pour cet article');
    }
    else
        $id=(int)$id;
    $commentManager= new Leekman\Blog\Model\CommentManager();
    $affectedline= $commentManager-> addcomment($id,$author,$postcomment);
    if ($affectedline === FALSE) {
        // Gestion de l'erreur à l'arrache
        throw new Exception ('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php');
        ;
    }
}
function reportcomment($id, $report){
    $commentManager= new Leekman\Blog\Model\CommentManager();
        $report++;   
        $update=$commentManager->updatereport($id,$report);
        header('Location: index.php');
        
    
    if ($update === FALSE){
        throw new Exception ('commentaire inexistant !');
    }
}
