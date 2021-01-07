<?php

class CourseClassDAO extends Database{
    function __contruct(){
        parent::getInstance();
    }
    public function insert($name){
        $sql = "INSERT INTO `CourseClass`( `title`) VALUES (:title);";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':title',$name, PDO::PARAM_STR);
        $query->execute();
        return "La classe a été bien ajouté";
    }
    public function readAll(){
        $sql = "SELECT * FROM `CourseClass` ORDER BY `title`;";
        $query = self::$connection->prepare($sql);
        $query->execute();

       return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readById($id){
        $result =null;
        if(!empty($id)){
            $sql = "SELECT * FROM `CourseClass` WHERE `id`=:id;";
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query = self::$connection->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }
    public function update(int $id,String $title){
        $sql = "UPDATE `CourseClass` SET `title`=:title WHERE `id`=:id;";
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query = self::$connection->prepare($sql);
        $query->execute();
        return "Titre modifié";
    }
    public function delete($id){
        $sql = "DELETE FROM `CourseClass` WHERE `id`=:id;";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return "Suppression effectuée";
    }
}