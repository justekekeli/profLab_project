<?php
class FieldDAO{
    private $field;
    private static $connection;

    function __construct(Field $field,$connection){
        $this->field= $field;
        self::$connection=$connection;
    }
    public function insert(){
        $sql="INSERT INTO `Course_Field`(`id`, `title`, `Add_date`) VALUES (:id,:title,curdate())";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':id', $this->field->id(), PDO::PARAM_INT);
        $query->bindValue(':title',$this->field->title(), PDO::PARAM_STR);
        $query->execute();
        return "Le domaine a été créé avec succès.";
    }
    public function readAll(){
        $sql="SELECT * FROM `Course_Field` ORDER BY `Add_date`";
        $query = self::$connection->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readbyId(int $id){
        $result =null;
        if(!empty($id)){
            $sql = "SELECT * FROM `Course_Field` WHERE `id`=:id;";
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query = self::$connection->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    }
    public function update(String $title){
        $sql = "UPDATE `Course_Field` SET `title`=:val WHERE `id`=:id;";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':val', $title, PDO::PARAM_STR);
        $query->bindValue(':id', $this->field->id(), PDO::PARAM_STR);
        $query->execute();
        return "le titre a été bien changé";
    }
    public function delete(){
        $sql = "DELETE FROM `Course_Field` WHERE `id`=:id;";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':id', $this->field->id(), PDO::PARAM_INT);
        $query->execute();
        return "Suppression effectuée";
       
    }
}