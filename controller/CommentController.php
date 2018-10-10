<?php 
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
    $allcomments=$commentmanager->getcomments();
  
    if ($comments === false){
        throw new Exception ('impossible d\'obtenir les commentaires!');
    }
    else {
        foreach ($allcomments as $comment){
            $idcomments[]=(int)$comment->id();
        }
        $_SESSION['idcomments']=$idcomments;
        return $allcomments;
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
function listcommentsbyarticlesbyreport($articles,$report) // get comments
{
    
    $commentsarticles=listcommentsbyarticles($articles);
    $comments0=[];
    $comments1=[];
    foreach ($commentsarticles as $comment){
        if (in_array($comment->idarticle(), $articles)){
           
                if ((int)$comment->report()===$report){
                $idcomments[]=(int)$comment->id();
                $comments[]=$comment;
                }
                
        }
      
    }
    $_SESSION['idcomments']=$idcomments;
    return $comments;
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
{
    $commentManager= new Leekman\Blog\Model\CommentManager();
    $affectedline= $commentManager-> addcomment($id,$author,$postcomment);
    if ($affectedline === false) {
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
