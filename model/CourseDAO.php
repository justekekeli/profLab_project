<?php
 class CourseDAO{
   private $connection;
     function __construct($connection){
      $this->connection=$connection;
     }
     public function insert($array){
        $sql = "INSERT INTO `Course`( `title`, `price`,`seanceTime`, `prof_id`, `class_id`, `field_id`, `descriptionCourse`) VALUES (:title,:price,:seanceTime,:prof,:class_id,:field_id,:descriptionCrs);";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':title',$array['title'], PDO::PARAM_STR);
        $query->bindValue(':price',$array['price'], PDO::PARAM_INT);
        $query->bindValue(':seanceTime', $array['seanceTime'], PDO::PARAM_STR);
        $query->bindValue(':prof', $array['prof'], PDO::PARAM_STR);
        $query->bindValue(':class_id',$array['class_id'], PDO::PARAM_INT);
        $query->bindValue(':field_id', $array['field_id'], PDO::PARAM_INT);
        $query->bindValue(':descriptionCrs', $array['desc'], PDO::PARAM_STR);
        $query->execute();
        return "Le cours a été bien ajouté";
     }
     public function readByField($field){
        $sql = "SELECT * FROM `Course` WHERE `field_id`=:field ;";
        $query->bindValue(':field', $field, PDO::PARAM_INT);
        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
     }
     public function readById(int $id){
        $result =null;
        if(!empty($id)){
            $sql = "SELECT * FROM `Course` WHERE `id`=:id;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }

            return $result;
     }
     public function readByProf(String $email){
      $result =null;
      if(!empty($id)){
          $sql = "SELECT * FROM `Course` WHERE `prof_id`=:id;";
          $query = $this->connection->prepare($sql);
          $query->bindValue(':id', $email, PDO::PARAM_INT);
          $query->execute();
          $result=$query->fetchAll(PDO::FETCH_ASSOC);
      }

          return $result;
      }
     public function update($array){
        $sql="UPDATE `Course` SET `title`=:title,`price`=:price],`seanceTime`=:seanceTime,`prof_id`=:prof,`class_id`=:class_id,`field_id`=:field_id,`descriptionCourse`=:descriptionCrs WHERE `id`=:id;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id', $array['id'], PDO::PARAM_INT);
        $query->bindValue(':title',$array['title'], PDO::PARAM_STR);
        $query->bindValue(':price',$array['price'], PDO::PARAM_INT);
        $query->bindValue(':price',$array['price'], PDO::PARAM_INT);
        $query->bindValue(':seanceTime', $array['seanceTime'], PDO::PARAM_STR);
        $query->bindValue(':class_id',$array['class_id'], PDO::PARAM_INT);
        $query->bindValue(':field_id', $array['field_id'], PDO::PARAM_INT);
        $query->bindValue(':descriptionCrs', $array['desc'], PDO::PARAM_STR);
        $query->execute();
        return "La modification a été un succès";
     }
     public function blocked(int $b,int $id){
      $sql="UPDATE `Course` SET `blocked`=:b WHERE `id`=:id;";
      $query = $this->connection->prepare($sql);
      $query->bindValue(':id',$id, PDO::PARAM_INT);
      $query->bindValue(':blocked', $b, PDO::PARAM_INT);
      $query->execute();
     }
     public function delete($id){
        $sql = "DELETE FROM `Course` WHERE `id`=:id;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        return "Suppression effectuée";
     }
 }