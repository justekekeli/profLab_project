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
         $listCourses = $course->readByAttribute(intval($id),"field");
         require('view/tableau_de_bord/field.php');     
    }
    public function addField($title){
        $message = $this->field->insert($title);
        require('../view/test.php'); 
    }
    public function updateField(int $id,String $title){
        $this->field->update($id,$title);
        require('../view/test.php'); 
    }
    public function deleteField(int $id){
        $this->field->delete($id);
    }
 
}