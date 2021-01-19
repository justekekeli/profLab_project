<?php 

    class HomeController{
        
        private $message='';
        private $conn;
        private $user;
        function __construct(){
            $this->conn = DataBase::getInstance();
            $this->user=new UserDAO($this->conn);

    }
    public function index(){
        require_once("view/public/home.php");
    }
    public  function authentificate($email,$pwd){
        if(!empty($email) && !empty($pwd)){
            $finded= $this->user->search($email,md5($pwd));
            if(!empty($finded)){
                $message="Connexion réussie.";
                require('view/testUser.php');
            }else{
                $message="Vos identifiants sont incorrects.";
                require('view/test.php');
            }
        }else{
            $message ="Veuillez remplir les champs";
            require('view/test.php');
        }
       

    }
    public function signup($email,$role,$pwd){
        if(!empty($email)&& !empty($role) && !empty($pwd)){
            if(!empty($this->user->readByEmail($email))){
                $message = "Le compte existe déja";
                require('view/test.php'); 
            }else{
                $newUser = array(
                    'email'=>$email,
                    'lastname'=>'',
                    'firstname'=>'',
                    'presentation'=>'',
                    'roleUser' =>$role,
                    'work'=>'',
                    'pwd'=>md5($pwd)
                );
                $message = $this->user->insert($newUser);
                require('view/testUser.php'); 
            }
           
        }else{
            $message = "Veuillez saisir les champs obligatoires";
            require('view/test.php'); 
        }


        
    }
  

}