<?php 
session_start();

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

function listcomments() // get comments
{
    $commentManager= new Leekman\Blog\Model\CommentManager();
    $comments=$commentManager->getcomments();
    if ($comments === false){
        throw new Exception ('impossible d\'obtenir les commentaires!');
    }
    else{
        require ('view/FrontEnd/view.php');
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
function reportcomment($id){
    $commentManager= new Leekman\Blog\Model\CommentManager();
    $currentcomment= $commentManager->getcomment($id);
    if ($currentcomment->report()===1){
        throw new Exception ('ce commentaire a déja été signalé, merci !');
    }
    else {
        $update=$commentManager->updatereport($id,1);
        header('Location: index.php');
        
    }
    if ($update === FALSE){
        throw new Exception ('commentaire inexistant !');
    }
}
