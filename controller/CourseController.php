<?php

class CourseController{
    private $message='';
    private $conn;
    private $course;
    private $field;
    function __construct(){
        $this->conn = DataBase::getInstance();
        $this->course=new CourseDAO($this->conn);
        $this->field=new FieldDAO($this->conn);

    }
    public function message(){
        return $this->message;
    }
    public function getCourses(String $email,$role){
       $listCourse= $this->course->readByAttribute($email,$role);
       if($role=="prof"){

       }
       if($role=="student"){
           
       }

    }
    public function getCourse($id){
            
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
    public function addCourse($title,$price,$seanceTime,$prof,$class,$fieldId,$desc){
        $classDao = new CourseClassDAO($this->conn);
        $class_id=null;
        $findedClass = $classDao->readByTitle($class);
        if(!empty($findedClass)){
            foreach($findedClass as $f){
                $class_id=$f['id'];
            }
        }else{
            $classDao->insert($class);
            $findedClass = $classDao->readByTitle($class);
            foreach($findedClass as $f){
                $class_id=$f['id'];
            }
        }
        $newCourse = array(
            'title'=>$title,
            'price'=>$price,
            'seanceTime'=>$seanceTime,
            'prof'=>$prof,
            'class_id' =>$class_id,
            'field_id'=>$fieldId,
            'desc'=>$desc
        );
        $message = $this->course->insert($newCourse);
        require('../view/test.php'); 
    }
    public function updateCourse($title,$price,$seanceTime,$prof,$class_id,$fieldId,$desc,$id){
        $updatedCourse = array(
            'id'=>$id,
            'title'=>$title,
            'price'=>$price,
            'seanceTime'=>$seanceTime,
            'prof'=>$prof,
            'class_id' =>$class_id,
            'field_id'=>$fieldId,
            'desc'=>$desc
        );
        
        $this->course->update($updatedCourse);
        require('../view/test.php'); 
    }
   public function deleteCourse($id){
       $this->course->blocked(1,$id);
   }
}