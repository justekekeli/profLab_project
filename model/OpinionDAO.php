<?php

class OpinionDAO extends Database{
    function __construct(){
        parent::getInstance();
    }
    public function insert($array){
        $sql = "INSERT INTO `Opinion`(`content`, `idProf`, `idReferent`) VALUES (:content,:prof,:ref);";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':content', $array['content'], PDO::PARAM_STR);
        $query->bindValue(':prof', $array['prof'], PDO::PARAM_STR);
        $query->bindValue(':ref', $array['referent'], PDO::PARAM_STR);
        $query->execute();

    }
    public function readAll(){
        $sql = "SELECT * FROM `Opinion`;";
        $query = self::$connection->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readById(int $value){
        $result=null;
        if(!empty($value)){
            $sql = "SELECT * FROM `Opinion` WHERE `id`=:id ;";
            $query = self::$connection->prepare($sql);
            $query->bindValue(':id', $value, PDO::PARAM_INT);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function updateContent(int $id,String $value){
        if(!empty($value)){
            $sql = "UPDATE `Opinion` SET `content`=:content WHERE `id`=:id;";
            $query = self::$connection->prepare($sql);
            $query->bindValue(':content', $value, PDO::PARAM_STR);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
        }
    }
    public function delete($id){
        $sql = "DELETE FROM `CommentCourse` WHERE `id`=:id;";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
}