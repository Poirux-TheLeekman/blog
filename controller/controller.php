 <?php
 session_start();
 use Leekman\Blog\Model\AdminManager;
 require_once ('model/BackEnd/AdminManager.php');
 
 
 /* admin controller
    function getAdmin($postlogin,$postpassword)
    {
        $admin= new AdminManager();
        $adminid=$admin->getAdminid();
    
        
        if($postlogin == $adminid->login() && password_verify($postpassword, $adminid->password()) === TRUE)
                {     
                    $_SESSION['IsAdmin']=TRUE;
                    $_SESSION['logbutton']='Déconnexion';
                    $_SESSION['logurl']='view/BackEnd/logout.php';
                    
                    
                }
                else 
                {
                    throw new Exception('identifiant non reconnu');
                }
                
        }*/
 function usercontrol(){
     if (!$_SESSION['IsAdmin']){
         $adminmanager=new AdminManager();
         $user=$adminmanager->makeuser(); 
     }
     else {
         // define the default name and content for the forms
         if (empty($_POST['author'])|| (empty($_POST['postcomment'])) ){
             $_POST['author'] = "votre pseudo" ;
             $_POST['postcomment'] ="votre message";
         }
     }

 }
 
 function logincontrol()
 {
     if ((isset($_POST['login'])) || (isset($_POST['password']))){
         getAdmin($_POST['login'],$_POST['password']);
         
         
     }
     else 
         login();
 }
   
    function indexcontrol(){
        require_once ('controller/backEnd/BackEndcontroller.php');
        if ($_SESSION['IsAdmin']===TRUE){
                $statut=$_POST['statutarticles'];
                adminindex($statut);
        }
        else {
                $statut=2;
                index();
        }
    }
        
  
    
    
    function viewcontrol(){
        require_once ('controller/backEnd/BackEndcontroller.php');
        
        if ((!isset($_GET['postId'])) || (!isset($_GET['article']))){
            if (isset($_POST['statutarticles']) ){
                $statut=$_POST['statutarticles'];
                adminindex($statut);
                
            }
                
                
        }
        elseif ((isset($_GET['postId']))&&((int) $_GET['postId']>0)){
            if ($_SESSION['IsAdmin']===TRUE){
                adminlistcomment($_GET['postId']);
            }
            else {
                listcomment($_GET['postId']);
            }
        }
        elseif ((isset($_GET['article']))&& in_array($_GET['article'], $_SESSION['idarticles']))
        {
            if ($_SESSION['IsAdmin']===TRUE){
                adminlistarticle($_GET['article']);
            }
            else {
                listarticle($_GET['article']);
            }
        }
        else {
            throw new Exception('identifiant non valide');
        }
    }