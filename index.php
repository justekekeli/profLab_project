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
require('model/OpinionDAO.php');
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
            //déconnexion
            case 'logout': 
                session_abort();
                require('view/public/home.php');
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
            case 'profil':
                if(!empty($_GET['email'])&& !empty($_GET['role'])){
                $userController= new UserController();
                $userController->getUser($_GET['email'],$_GET['role']);
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
                    $courseController->getCourse($_GET['id'],true);
                }

            break;
            case 'course':
                if(!empty($_GET['id'])){
                    $courseController= new CourseController();
                    $courseController->getCourse($_GET['id']);
                }

            break;
            case 'suscribe':
                if(!empty($_GET['course']) && !empty($_GET['student']) ){
                    $courseController= new CourseController();
                    $courseController->subscribe($_GET['course'],$_GET['student'],$_GET['p']);
                }

            break;
            case 'presentation':
                if(!empty($_GET['id']) ){
                    $userController= new UserController();
                    $userController->getUser($_GET['id'],true);
                }

            break;
            case 'addComment':
                if(!empty($_GET['cs']) && !empty($_GET['id']) && !empty($_POST['content'])){
                    $commentController= new CommentController();
                    $commentController->addComment($_POST['content'],$_GET['cs'],intval($_GET['id']));
                }

            break;
            case 'courseAdd':
                if(!empty($_GET['id'])){
                    $type='add';
                    $fieldController=new FieldController();
                    $listFields=$fieldController->getFields();
                    require('view/tableau_de_bord/courseForm.php');
                }

            break;
            case 'insertCourse':               
                $courseController= new CourseController();
                $courseController->addCourse(htmlspecialchars($_POST['title'])
                ,htmlspecialchars($_POST['day'])
                ,htmlspecialchars($_POST['start'])
                ,htmlspecialchars($_POST['end'])
                ,htmlspecialchars($_POST['prof'])
                ,htmlspecialchars($_POST['classe'])
                ,htmlspecialchars($_POST['field'])
                ,htmlspecialchars($_POST['desc'])
                ,htmlspecialchars($_POST['link'])
                ,htmlspecialchars($_POST['p'])
            );
            break;
        }
}
else{
    $homeController->index();
}