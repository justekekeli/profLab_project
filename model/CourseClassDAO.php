<?php

class CourseClassDAO{
    private $connection;
    function __contruct($connection){
       $this->connection =$connection;
    }
    public function insert($name){
        $sql = "INSERT INTO `CourseClass`( `title`) VALUES (:title);";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':title',$name, PDO::PARAM_STR);
        $query->execute();
        return "La classe a été bien ajouté";
    }
    public function readAll(){
        $sql = "SELECT * FROM `CourseClass` ORDER BY `title`;";
        $query = $this->connection->prepare($sql);
        $query->execute();

       return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readByTitle(String $title){
        $result =null;
        $sql = "SELECT * FROM `CourseClass` WHERE `title`=:title;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->execute();
        $result=$query->fetchAll(PDO::FETCH_ASSOC);
        

        return $result;
    }
    public function update(int $id,String $title){
        $sql = "UPDATE `CourseClass` SET `title`=:title WHERE `id`=:id;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        return "Titre modifié";
    }
    public function delete($id){
        $sql = "DELETE FROM `CourseClass` WHERE `id`=:id;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return "Suppression effectuée";
    }
}