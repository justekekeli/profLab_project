<?php
require('../model/Database.php');
require('../model/FieldDAO.php');
require('../model/Course.php');

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
        $listUsers=$this->field->readAll();
        require('../view/test.php');

    }
    public function getField($id){
         $theField = $this->field->readById($id);
         $course = new CourseDAO($this->conn);
         $listCourses = $course->readByField($id);
         require('../view/test.php');       
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