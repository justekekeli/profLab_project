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
require('model/Student_CourseDAO.php');
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
                    $homeController->authentificate($_POST['email'],md5($_POST['pwd']));
                }
            break;
            //si l'action est une inscription
            case 'signup':
                if(!empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['role']) && !empty($_POST['nom']) && !empty($_POST['prenom'])){
                            $homeController->signup($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['role'],$_POST['pwd']);
                }
            break;
            //formulaire d'inscription
            case 'signupForm':
                require('view/public/signup.php');
            break;
            //formulaire de connexion
            case 'signin':
                require('view/public/signin.php');
            break;
            //page d'a propos
            case 'about':
                require('view/public/about.php');
            break;
            //page de contact
            case 'contact':
                require('view/public/contact.php');
            break;
            //les pages sur les différents domaines
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
            case 'cal': 
                if(!empty($_GET['m'])&& !empty($_GET['p'])){
                    $homeController->authentificate($_GET['m'],$_GET['p']);
                }
            break;
            case 'dom':
                if(!empty($_GET['id'])){
                    $fieldController= new FieldController();
                    $fieldController->getField($_GET['id']);
                }

            break;
            case 'mes_cours':
                if(!empty($_GET['id'])){
                    $courseController= new CourseController();
                    $courseController->getCourse($_GET['id']);
                }

            break;
        }
}
else{
    $homeController->index();
}