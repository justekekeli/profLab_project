<?php
 class CourseDAO{
   private $connection;
     function __construct($connection){
      $this->connection=$connection;
     }
     public function insert($array){
        $sql = "INSERT INTO `Course`( `title`, `daySeance`,`seanceStart`,`seanceEnd`, `prof_id`, `class_id`, `field_id`, `descriptionCourse`,`link`) VALUES (:title,:daySeance,:seanceS,:seanceE,:prof,:class_id,:field_id,:descriptionCrs,:link);";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':title',$array['title'], PDO::PARAM_STR);
        $query->bindValue(':daySeance',$array['day'], PDO::PARAM_STR);
        $query->bindValue(':seanceS', $array['start'], PDO::PARAM_STR);
        $query->bindValue(':seanceE', $array['end'], PDO::PARAM_STR);
        $query->bindValue(':prof', $array['prof'], PDO::PARAM_STR);
        $query->bindValue(':class_id',$array['class_id'], PDO::PARAM_INT);
        $query->bindValue(':field_id', $array['field_id'], PDO::PARAM_INT);
        $query->bindValue(':descriptionCrs', $array['desc'], PDO::PARAM_STR);
        $query->bindValue(':link', $array['link'], PDO::PARAM_STR);
        $query->execute();
        return "Le cours a été bien ajouté";
     }
     public function readById($id){
      $sql = "SELECT Course.*,CourseClass.title as classe FROM `Course`,`CourseClass` WHERE Course.id=:id AND class_id=CourseClass.id";
      $query = $this->connection->prepare($sql);
      $query->bindValue(':id', $id, PDO::PARAM_INT);
      $query->execute();

      return $query->fetchAll(PDO::FETCH_ASSOC);
     }
     public function readByAttribute($val,$attribute){
        $sql="";
        if($attribute=="field"){
         $sql = "SELECT Course.*,CourseClass.title as classe,App_User.lastname as profL,App_User.firstname as profF FROM `Course`,`CourseClass`,`App_User` WHERE `field_id`=:val AND `prof_id`=App_User.email AND `class_id`=CourseClass.id;";
        }
        if($attribute=="prof"){
         $sql = "SELECT Course.*,prof_id as email FROM `Course` WHERE `prof_id`=:val ;";
        }
        if($attribute=="student"){
         $sql = "SELECT Course.*,Student_Course.idStudent as email,`start`,`end` FROM `Course`,`Student_Course` WHERE `idStudent`=:val AND `idCourse`=Course.id;";
        }
        $query = $this->connection->prepare($sql);
        $query->bindValue(':val', $val, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
     }
     public function nbreStudents(int $id){

            $sql = "SELECT COUNT(idStudent) as countS FROM `Course`,`Student_Course` WHERE Course.id=:id AND idCourse=Course.id ;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        
            return $result;
     }
    /* public function readByProf(String $email){
      
          $sql = "SELECT * FROM `Course` WHERE `prof_id`=:id;";
          $query = $this->connection->prepare($sql);
          $query->bindValue(':id', $email, PDO::PARAM_INT);
          $query->execute();
          $result=$query->fetchAll();
      

          return $result;
      }*/
      
     public function update($array){
        $sql="UPDATE `Course` SET `title`=:title,`daySeance`=:daySeance,`seanceStart`=:seanceS,`seanceEnd`=:seanceEnd,`prof_id`=:prof,`class_id`=:class_id,`field_id`=:field_id,`descriptionCourse`=:descriptionCrs,`link`=:link WHERE `id`=:id;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id', $array['id'], PDO::PARAM_INT);
        $query->bindValue(':title',$array['title'], PDO::PARAM_STR);
        $query->bindValue(':daySeance',$array['day'], PDO::PARAM_STR);
        $query->bindValue(':seanceS', $array['start'], PDO::PARAM_STR);
        $query->bindValue(':seanceEnd', $array['end'], PDO::PARAM_STR);
        $query->bindValue(':prof', $array['prof'], PDO::PARAM_STR);
        $query->bindValue(':class_id',$array['class_id'], PDO::PARAM_INT);
        $query->bindValue(':field_id', $array['field_id'], PDO::PARAM_INT);
        $query->bindValue(':descriptionCrs', $array['desc'], PDO::PARAM_STR);
        $query->bindValue(':link', $array['link'], PDO::PARAM_STR);
       
        $query->execute();
        return "La modification a été un succès";
     }
     public function blocked(int $b,int $id){
      $sql="UPDATE `Course` SET `blocked`=:b WHERE `id`=:id;";
      $query = $this->connection->prepare($sql);
      $query->bindValue(':id',$id, PDO::PARAM_INT);
      $query->bindValue(':b', $b, PDO::PARAM_INT);
      $query->execute();
     }
     public function delete($id){
        $sql = "DELETE FROM `Course` WHERE `id`=:id;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return "Suppression effectuée";
     }
 }