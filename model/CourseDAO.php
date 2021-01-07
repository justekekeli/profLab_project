<?php
 class CourseDAO extends Database{

     function __construct(){
      parent::getInstance();
     }
     public function insert($array){
        $sql = "INSERT INTO `Course`( `title`, `price`, `prof_id`, `class_id`, `field_id`, `descriptionCourse`) VALUES (:title,:price,:prof,:class_id,:field_id,:descriptionCrs);";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':title',$array['title'], PDO::PARAM_STR);
        $query->bindValue(':price',$array['price'], PDO::PARAM_INT);
        $query->bindValue(':prof', $array['prof'], PDO::PARAM_STR);
        $query->bindValue(':class_id',$array['class_id'], PDO::PARAM_INT);
        $query->bindValue(':field_id', $array['field_id'], PDO::PARAM_INT);
        $query->bindValue(':descriptionCrs', $array['description'], PDO::PARAM_STR);
        $query->execute();
        return "Le cours a été bien ajouté";
     }
     public function readAll(){
        $sql = "SELECT * FROM `Course` ORDER BY `title`;";
        $query = self::$connection->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
     }
     public function readById(int $id){
        $result =null;
        if(!empty($id)){
            $sql = "SELECT * FROM `Course` WHERE `id`=:id;";
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query = self::$connection->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }

            return $result;
     }
     public function update($array){
        $sql="UPDATE `Course` SET `title`=:title,`price`=:price],`prof_id`=;prof,`class_id`=:class_id,`field_id`=:field_id,`descriptionCourse`=:descriptionCrs WHERE `id`=:id;";
        $query->bindValue(':id', $array['id'], PDO::PARAM_INT);
        $query->bindValue(':title',$array['title'], PDO::PARAM_STR);
        $query->bindValue(':price',$array['price'], PDO::PARAM_INT);
        $query->bindValue(':prof', $array['prof'], PDO::PARAM_STR);
        $query->bindValue(':class_id',$array['class_id'], PDO::PARAM_INT);
        $query->bindValue(':field_id', $array['field_id'], PDO::PARAM_INT);
        $query->bindValue(':descriptionCrs', $array['description'], PDO::PARAM_STR);
        $query->execute();
        $query->execute();
        return "La modification a été un succès";
     }
     public function delete($id){
        $sql = "DELETE FROM `Course` WHERE `id`=:id;";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        return "Suppression effectuée";
     }
 }