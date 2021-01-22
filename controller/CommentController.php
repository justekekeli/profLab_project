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
    public function addComment(String $content,String $email,int $coursId){
        $newComment=array(
            'content'=>$content,
            'customer'=>$email,
            'coursId'=>intval($coursId)
        );
        $this->comment->insert($newComment);
        $courseController  = new CourseController();
        $courseController->getCourse($coursId);
    }
    
   public function deleteComment(int $id){
       $this->comment->delete($id);
   }
}