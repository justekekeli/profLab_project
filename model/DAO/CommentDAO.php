<?php
class CommentDAO{
    private $comment;
    private static $connection = null;
    function __construct(Comment $com,$connection){
        $this->comment=$com;
        $this->connection=$connection;
    }
    public static function connection(){
        return self::$connection;
    }
    public function insert(){
        $sql = "INSERT INTO `CommentCourse`(`id`,`content`, `customer_id`, `course_id`) VALUES (:id,:content,:customer_id,:course_id);";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':id', $this->comment->id(), PDO::PARAM_INT);
        $query->bindValue(':content', $this->comment->content(), PDO::PARAM_STR);
        $query->bindValue(':customer_id', $this->comment->customerId(), PDO::PARAM_STR);
        $query->bindValue(':course_id', $this->comment->courseId(), PDO::PARAM_INT);
        $query->execute();

    }
    public function readAll(){
        $sql = "SELECT * FROM `CommentCourse`;";
        $query = self::$connection->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readById(int $value){
        $result=null;
        if(!empty($value)){
            $sql = "SELECT * FROM `CommentCourse` WHERE `id`=:id ;";
            $query = self::$connection->prepare($sql);
            $query->bindValue(':course_id', $value, PDO::PARAM_INT);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function update($content,$cust,$course){
        $sql = "UPDATE `CommentCourse` SET `content`=:content, `customer_id`=:customer_id, `course_id`=:ci WHERE `id`=:id;";
        $query = $db->prepare($sql);
        $query->bindValue(':content', $content, PDO::PARAM_STR);
        $query->bindValue(':customer_id',$cust, PDO::PARAM_STR);
        $query->bindValue(':course_id', $course, PDO::PARAM_INT);
        $query->bindValue(':id', $this->comment->id(), PDO::PARAM_INT);
        $query->execute();
    }
    public function updateContent(String $value){
        if(!empty($value)){
            $sql = "UPDATE `CommentCourse` SET `content`=:content WHERE `id`=:id;";
            $query = self::$connection->prepare($sql);
            $query->bindValue(':content', $value, PDO::PARAM_STR);
            $query->bindValue(':id', $this->comment->id(), PDO::PARAM_INT);
            $query->execute();
        }
    }
    public function delete(){
        $sql = "DELETE FROM `CommentCourse` WHERE `id`=:id;";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':id', $this->comment->id(), PDO::PARAM_INT);
        $query->execute();
    }
}