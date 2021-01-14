<?php
class CommentDAO{
    private $connection;
    function __construct($connection){
        $this->connection=$connection;
    }
    public function insert($array){
        $sql = "INSERT INTO `CommentCourse`(`content`, `customer_id`, `course_id`) VALUES (:content,:customer_id,:course_id);";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':content', $array['content'], PDO::PARAM_STR);
        $query->bindValue(':customer_id', $array['customer'], PDO::PARAM_STR);
        $query->bindValue(':course_id', $array['coursId'], PDO::PARAM_INT);
        $query->execute();

    }
    public function readAll(){
        $sql = "SELECT * FROM `CommentCourse`;";
        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readById(int $value){
        $result=null;
        if(!empty($value)){
            $sql = "SELECT * FROM `CommentCourse` WHERE `id`=:id ;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $value, PDO::PARAM_INT);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function updateContent(int $id,String $value){
        if(!empty($value)){
            $sql = "UPDATE `CommentCourse` SET `content`=:content WHERE `id`=:id;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':content', $value, PDO::PARAM_STR);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
        }
    }
    public function delete($id){
        $sql = "DELETE FROM `CommentCourse` WHERE `id`=:id;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
}