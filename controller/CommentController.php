<?php
class CommentController{
    private $message='';
    private $conn;
    private $comment;
    private $course;
    function __construct(){
        $this->conn = DataBase::getInstance();
        $this->course=new CourseDAO($this->conn);
        $this->comment=new CommentDAO($this->conn);

    }
    public function message(){
        return $this->message;
    }
    public function getCommentByCourse(int $id){
       $listCourse= $this->comment->readAll($id);

    }
    public function addComment(String $content,String $email,id $coursId){
        $newComment=array(
            'content'=>$content,
            'customer_id'=>$email,
            'course_id'=>intval($coursId)
        );
        $this->comment->insert($newComment);
        require('../view/test.php'); 
    }
    
   public function deleteComment(int $id){
       $this->comment->delete($id);
   }
}