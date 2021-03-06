<?php

class FieldController{
    private $message='';
    private $conn;
    private $field;
    function __construct(){
        $this->conn = DataBase::getInstance();
        $this->field=new FieldDAO($this->conn);
    }
    public function message(){
        return $this->message;
    }
    public function getFields(){       
        $listFields=$this->field->readAll();
        return $listFields;

    }
    public function getField($id){
         $theField = $this->field->readById($id);
         $course = new CourseDAO($this->conn);
         $courses = $course->readByAttribute(intval($id),"field");
         $listCourses=array();
         foreach($courses as $c){
             if($c['blocked']!=1){
                 $listCourses[]=$c;
             }
         }
         require('view/tableau_de_bord/field.php');     
    }
    public function addField($title,$m,$p){
        
        $message = $this->field->insert($title);
       header('Location:index.php?action=cal&m='.$m.'&p='. $p); 
    }
  /*  public function updateField(int $id,String $title){
        $this->field->update($id,$title);
        require('../view/test.php'); 
    }
    public function deleteField(int $id){
        $this->field->delete($id);
    }*/
 
}