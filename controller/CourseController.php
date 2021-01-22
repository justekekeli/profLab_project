<?php

class CourseController{
    private $message='';
    private $conn;
    private $course;
    private $courseClass;
    private $field;
    function __construct(){
        $this->conn = DataBase::getInstance();
        $this->course=new CourseDAO($this->conn);
        $this->field=new FieldDAO($this->conn);
        $this->courseClass=new CourseClassDAO($this->conn);
    }
    public function message(){
        return $this->message;
    }
  /*  public function getCourses(String $email,$role){
       $listCourse= $this->course->readByAttribute($email,$role);
       if($role=="prof"){

       }
       if($role=="student"){
           
       }

    }*/
    public function getCourse($id,$userCourse=false){
            
        $theCourse = $this->course->readById(intval($id));
        $commentDAO= new CommentDAO($this->conn);
        $listComments= $commentDAO->readAll(intval($id));
        $crsDAO= new Student_CourseDAO($this->conn);
        $nbr= $crsDAO->count(intval($id));
        $nbrStudents = $nbr['countS'];
        $listComments= $commentDAO->readAll(intval($id));
        $days=array('Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi');
        require('view/tableau_de_bord/theCourse.php');       
    }
    public function updateForm($id){
        $type='update';
        $theCourse = $this->course->readById(intval($id));
        $fieldController=new FieldController();
        $listFields=$fieldController->getFields();
        require('view/tableau_de_bord/courseForm.php');
    }
    public function addCourse($title,$day,$seanceS,$seanceE,$prof,$classe,$fieldId,$desc,$link,$p){
        $findedClass = $this->courseClass->readByTitle($classe);
        if(!empty($findedClass)){
            foreach($findedClass as $f){
                $class_id=$f['id'];
            }
        }else{
            $this->courseClass->insert($classe);
            $findedClass = $this->courseClass->readByTitle($classe);
            foreach($findedClass as $f){
                $class_id=$f['id'];
            }
        }
        $newCourse = array(
            'title'=>$title,
            'day'=>$day,
            'start'=>$seanceS,
            'end'=>$seanceE,
            'prof'=>$prof,
            'class_id' =>$class_id,
            'field_id'=>$fieldId,
            'desc'=>$desc,
            'link'=>$link
        );
       // print_r($newCourse);
        $message = $this->course->insert($newCourse);
       header('Location:index.php?action=cal&m='.$prof.'&p='. $p); 
    }
    public function updateCourse($title,$day,$seanceS,$seanceE,$prof,$classe,$fieldId,$desc,$link,$p,$id){
        $findedClass = $this->courseClass->readByTitle($classe);
        if(!empty($findedClass)){
            foreach($findedClass as $f){
                $class_id=$f['id'];
            }
        }else{
            $this->courseClass->insert($classe);
            $findedClass = $this->courseClass->readByTitle($classe);
            foreach($findedClass as $f){
                $class_id=$f['id'];
            }
        }
        $updatedCourse = array(
            'id'=>$id,
            'title'=>$title,
            'day'=>$day,
            'start'=>$seanceS,
            'end'=>$seanceE,
            'prof'=>$prof,
            'class_id' =>$class_id,
            'field_id'=>$fieldId,
            'desc'=>$desc,
            'link'=>$link
        );
     //   print_r($updatedCourse);
        $this->course->update($updatedCourse);
        header('Location:index.php?action=cal&m='.$prof.'&p='. $p); 
    }
   public function deleteCourse($id,$prof,$p){
       $this->course->blocked(1,$id);
       header('Location:index.php?action=cal&m='.$prof.'&p='. $p); 
   }
   public function subscribe($course,$student){
        $crsDAO= new Student_CourseDAO($this->conn);
        $newSub=array(
            'course'=>intval($course),
            'student'=>$student
        );
        $crsDAO->insert($newSub);
        $_SESSION['mes_cours']=$this->course->readByAttribute($email,"student");
        $message="Vous êtes enregistré pour le cours particulier ";
        header('Location:index.php?action=cal&m='.$student.'&p='. $p);
       

   }
}