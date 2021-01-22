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
            $finded= $this->user->search($email,$pwd);

            if(!empty($finded)){
                if($finded[0]['blocked']==1){
                    $message="Vous avez été bloqué.";
                    require('view/public/signin.php');
                }else{
                    $message="Connexion réussie.";
                    //domaines disponibles dans l'application
                    $field= new FieldDAO($this->conn);
                    $fields=$field->readAll();
                    //récupération des données de l'utilisateur connecté
                    $userInfos=array();
                    foreach($finded as $connected){
                        $userInfos['nom']=$connected['lastname'];
                        $userInfos['prenom']=$connected['firstname'];
                        $userInfos['email']=$connected['email'];
                        $userInfos['pwd']=$connected['pwd'];
                        $userInfos['role']=$connected['roleUser'];
                    }
                    if($userInfos['role']=='admin'){
                        $datas=array('','');
                        $totalProfs=$this->user->countProf();
                        $totalStudents=$this->user->countStudents();
                        $courseDao =new CourseDAO($this->conn);
                        $totalCourses=$courseDao->countCourses();
                        require('view/tableau_de_bord/calendar.php');
                    }else{   
                        $datas = $this->load($userInfos['email'],$userInfos['role']);       
                        require('view/tableau_de_bord/calendar.php');
                    }

                }
                
            }else{
                $message="Vos identifiants sont incorrects.";
                require('view/public/signin.php');
            }
        }else{
            $message ="Veuillez remplir les champs";
            require('view/public/signin.php');
        }
       

    }
    public function load($email,$role){
        if($role=='student'){
            $courseDao= new CourseDAO($this->conn);
            $courses= $courseDao->readByAttribute($email,"student");
        }
        if($role=='prof'){
            $courseDao= new CourseDAO($this->conn);
            $courses= $courseDao->readByAttribute($email,"prof");
        }
        $colors =array('blue','brown','red','green','orange','purple','gray');
        foreach($courses as $row)
        { if($row['blocked']!=1){
            $data[] = array(
                'grouId'   => $row["id"],
                'title'   => $row["title"],
                'daysOfWeek'=>[$row['daySeance']],
                'startTime'   => $row["seanceStart"],
                'endTime'   => $row["seanceEnd"],
                'color'=>'white',
                'borderColor'=> $colors[intval($row['daySeance'])],
                'textColor'=> $colors[intval($row['daySeance'])]
                );
        }
            
        }  
        if(isset($data)) {
            $datas=array($data,$courses);
        }else{
            $datas=array('',$courses);
        }
        
        return $datas;
    }
    public function signup($nom='',$prenom='',$email,$role,$pwd){
        if(!empty($email)&& !empty($role) && !empty($pwd) && !empty($nom) && !empty($prenom)){
            if(!empty($this->user->readByEmail($email))){
                $message = "Le compte existe déja";
                require('view/public/signup.php'); 
            }else{
                $newUser = array(
                    'email'=>$email,
                    'lastname'=>$nom,
                    'firstname'=>$prenom,
                    'presentation'=>'',
                    'roleUser' =>$role,
                    'work'=>'',
                    'pwd'=>md5($pwd)
                );
                $message = $this->user->insert($newUser);
                $finded= $this->user->readByEmail($email);
                foreach($finded as $connected){
                    $userInfos['nom']=$connected['lastname'];
                    $userInfos['prenom']=$connected['firstname'];
                    $userInfos['email']=$connected['email'];
                    $userInfos['pwd']=$connected['pwd'];
                    $userInfos['role']=$connected['roleUser'];
                }
                $field= new FieldDAO($this->conn);
                $fields=$field->readAll();
                $datas=array('','');
                require('view/tableau_de_bord/calendar.php'); 
            }
           
        }else{
            $message = "Veuillez saisir les champs obligatoires";
            require('view/public/signup.php'); 
        }


        
    }
  

}