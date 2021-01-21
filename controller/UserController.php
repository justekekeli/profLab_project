<?php

class UserController{
    private $message='';
    private $conn;
    private $user;
    private $opinion;
    function __construct(){
        $this->conn = DataBase::getInstance();
        $this->user=new UserDAO($this->conn);
        $this->opinion=new OpinionDAO($this->conn);

    }
    public function message(){
        return $this->message;
    }
    public function getUsers(){       
        $listUsers=$this->user->readAll();
        require('../view/test.php');

    }
    public function getUser($email,$presentation=false){
        $theUser = $this->user->readByEmail($email);
        $totalStudents=0;
        $totalCourses=0;
        if($presentation){
            $courseDAO= new CourseDAO($this->conn);
            $listCourses= $courseDAO->readByAttribute($email,"prof");
            $listOpinions=$this->opinion->readAll($email);
            foreach($listCourses as $c){
              $nbr=  $courseDAO->nbreStudents($c['id']);
              //total de tous les élèves du prof
              $totalStudents+=$nbr[0]['countS'];;
              $totalCourses ++;
            }
            require("view/tableau_de_bord/profPresentationPage.php");
        }else{       
            $listOpinions = $this->opinion->readAll($email);
            require('../view/test.php');   
        }
    
    }
    public function addUser($email,$lastN,$firstN,$presentation,$role,$work,$pwd){
        $newUser = array(
            'email'=>$email,
            'lastname'=>$lastN,
            'firstname'=>$firstN,
            'presentation'=>$presentation,
            'roleUser' =>$role,
            'work'=>$work,
            'pwd'=>md5($pwd)
        );
        $message = $this->user->insert($newUser);
        require('../view/test.php'); 
    }
    public function updateUser($email,$lastN,$firstN,$role,$work,$pwd,$newEmail){
        $updatedUser = array(
            'email'=>$email,
            'lastname'=>$lastN,
            'firstname'=>$firstN,
            'roleUser' =>$role,
            'work'=>$work,
            'pwd'=>Crypt::encrypt($pwd)
        );
        if($email!=$newEmail){
            $this->user->updateEmail($newEmail,$email);
        }
        $this->user->update($updatedUser);
        require('../view/test.php'); 
    }
    public function giveOpinion($emailReferent,$prof,$lastN,$firstN,$role,$work,$opinionMessage){
        $referent = $this->user->readByEmail($email);
        if(empty($referent)){
            $newReferent=array(
                'email'=>$emailReferent,
                'lastname'=>$lastN,
                'firstname'=>$firstN,
                'roleUser' =>$role,
                'work'=>$work,
                'pwd'=>''
            );
            $this->user->insert($newReferent);
        }
        $newOpinion =array(
            'content'=>$opinionMessage,
            'prof'=>$prof,
            'referent'=>$emailReferent
        );
        $this->opinion->insert($newOpinion);
        $message='Votre opinion a été ajouté';
        require('../view/test.php'); 
    }
    public function block($email,$blocked){
        $this->user->updateBlocked($email,$blocked);
        $course = new CourseDAO($this->conn);
        $listCourse = $course->readByProf($email);
        foreach($listCourse as $crs){
            $course->blocked(1,$crs['id']);
        }
        $message='l\'utilisateur a été bloqué';
        require('../view/test.php'); 
    }
}