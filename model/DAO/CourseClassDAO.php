<?php

class CourseClassDAO{
    private $classe;
    private static $connection;

    function __contruct(CourseClass $classe,$connection){
        $this->classe=$classe;
        self::$connection=$connection;
    }
    public function insert(){
        $sql = "INSERT INTO `CourseClass`(`id`, `title`) VALUES (:id,:title);";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':id', $this->classe->id(), PDO::PARAM_INT);
        $query->bindValue(':title',$this->classe->title(), PDO::PARAM_STR);
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
    public function update(String $title){
        $sql = "UPDATE `CourseClass` SET `title`=:title WHERE `id`=:id;";
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':id', $this->classe->id(), PDO::PARAM_STR);
        $query = self::$connection->prepare($sql);
        $query->execute();
        return "Titre modifié";
    }
    public function delete(){
        $sql = "DELETE FROM `CourseClass` WHERE `id`=:id;";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':id', $this->classe->id(), PDO::PARAM_INT);
        $query->execute();
        return "Suppression effectuée";
    }
}