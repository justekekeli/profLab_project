<?php

require('controller/CommentController.php');
require('controller/CourseController.php');
require('controller/FieldController.php');
require('controller/HomeController.php');
require('controller/UserController.php');
require('model/Database.php');
require('model/CourseDAO.php');
require('model/CommentDAO.php');
require('model/UserDAO.php');
require('model/FieldDAO.php');
require('model/CourseClassDAO.php');
//création d'une instance de HomeController
$homeController= new HomeController();
//verification of url parameter
if(isset($_GET['action']) && !empty($_GET['action'])){
        switch($_GET['action']){
            //si l'action est une demande de connection
            case 'auth': 
                if(!empty($_POST['email'])&& !empty($_POST['pwd'])){
                    $homeController->authentificate($_POST['email'],$_POST['pwd']);
                }
            break;
            case 'signup':
                if(isset($_POST['email']) && isset($_POST['pwd'])&& isset($_POST['role'])){
                        $homeController->signup($_POST['email'],$_POST['role'],$_POST['pwd']);
                }
            break;
            case 'signupForm':
                require('view/public/signup.php');
            break;
            case 'signin':
                require('view/public/signin.php');
            break;
            case 'about':
                require('view/public/about.php');
            break;
            case 'contact':
                require('view/public/contact.php');
            break;
            case 'eco':
                require('view/public/eco.php');
            break;
            case 'info':
                require('view/public/info.php');
            break;
            case 'math':
                require('view/public/math.php');
            break;
            case 'li':
                require('view/public/li.php');
            break;
            case 'bord':
                require('view/tableau_de_bord/acceuil.php');
            break;
        }
}
else{
    $homeController->index();
}