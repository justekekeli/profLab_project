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
        return $listUsers;

    }
    public function getUser($email,$role="",$admin=0,$presentation=false){
        $theUser = $this->user->readByEmail($email);
        $ad=$admin;
        $totalStudents=0;
        $totalCourses=0;
        $nbr=array(0=>array('countS'=>0));
        $courseDAO= new CourseDAO($this->conn);
        if(!$presentation){
            if($role=='prof'){
                $listCourses= $courseDAO->readByAttribute($email,"prof");
            }else if ($role=='student'){
                $listCourses= $courseDAO->readByAttribute($email,"student");
            }
        }else{
            $listCourses= $courseDAO->readByAttribute($email,"prof");
        }
       
        $listOpinions=$this->opinion->readAll($email);
        if(!empty($listCourses)){
            foreach($listCourses as $c){
                if($role='prof'){
                    if($c['blocked']!=1){
                        $nbr=  $courseDAO->nbreStudents($c['id']);
                    }
                    
                }else if ($role=='student'){
                    $sc= new Student_CourseDAO($this->conn);
                    $nbr=$sc->countCourses($email);

                }
                
                //total de tous les élèves du prof
                $totalStudents+=$nbr[0]['countS'];
                if($c['blocked']!=1){
                $totalCourses ++;}
              }
        }
        if($presentation){

            require("view/tableau_de_bord/profPresentationPage.php");
        }else{       
            require('view/tableau_de_bord/profil.php');   
        }
    
    }
    public function addUser($email,$lastN,$firstN,$role,$pwd){
        $newUser = array(
            'email'=>$email,
            'lastname'=>$lastN,
            'firstname'=>$firstN,
            'presentation'=>'',
            'roleUser' =>$role,
            'work'=>'',
            'pwd'=>md5($pwd)
        );
        $message = $this->user->insert($newUser);
        header('Location:index.php?action=listUsers'); 
    }
    public function updateUser($email,$lastN,$firstN,$role,$work,$presentation,$pwd,$newEmail){
        $updatedUser = array(
            'email'=>$email,
            'lastname'=>$lastN,
            'firstname'=>$firstN,
            'presentation'=>$presentation,
            'roleUser' =>$role,
            'work'=>$work,
            'pwd'=>md5($pwd)
        );
        if($email!=$newEmail){
            $this->user->updateEmail($newEmail,$email);
        }
      //  print_r($updatedUser);
        $this->user->update($updatedUser);
        header('Location:index.php?action=profil&email='.$newEmail.'&role='.$role); 
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
        $message='l\'utilisateur a été bloqué';
        header('Location:index.php?action=listUsers');  
    }
}