<?php
class CourseClassDAO{
    private $connection;
    function __construct($connection){
        $this->connection=$connection;
    }
    public function insert($title){
        $sql="INSERT INTO `CourseClass`(`title`) VALUES (:title)";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':title',$title, PDO::PARAM_STR);
        $query->execute();
        return "La classe a été créé avec succès.";
    }
    public function readAll(){
        $sql="SELECT * FROM `CourseClass` ORDER BY `title`";
        $query = $this->connection->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readbyTitle($title){
        $result =null;
        if(!empty($title)){
            $sql = "SELECT * FROM `CourseClass` WHERE `title`=:title;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':title', $title, PDO::PARAM_STR);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }
    public function update(int $id,String $title){
        $sql = "UPDATE `CourseClass` SET `title`=:val WHERE `id`=:id;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':val', $title, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return "le titre a été bien changé";
    }
    public function delete($id){
        $sql = "DELETE FROM `CourseClass` WHERE `id`=:id;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return "Suppression effectuée";
       
    }
}