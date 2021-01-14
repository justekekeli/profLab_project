<?php 
require('../model/Database.php');
require('../model/UserDAO.php');
    class HomeController{
        
        private $message='';
        private $conn;
        private $user;
        function __construct(){
            $this->conn = DataBase::getInstance();
            $this->user=new UserDAO($this->conn);

    }
    public function index(){
        
    }
    public  function authentificate($email,$pwd){
        if(!empty($email) && !empty($pwd)){
            $finded= $this->user->search($email,Crypt::encrypt($pwd));
            if(!empty($finded)){

            }else{
                $message="Vos identifiants sont incorrects.";
            }
        }else{
            $message ="Veuillez remplir les champs";
        }
       

    }
  

}