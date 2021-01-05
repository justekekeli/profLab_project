<?php
 class CourseDAO{
     private $course;
     private static $connection;

     function __construct(Course $course,$connection){
         $this->course=$course;
         self::$connection=$connection;
     }
     public function insert(){
        $sql = "INSERT INTO `Course`(`id`, `title`, `price`, `prof_id`, `class_id`, `field_id`, `descriptionCourse`) VALUES (:id,:title,:price,:prof,:class_id,:field_id,:descriptionCrs);";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':id', $this->course->id(), PDO::PARAM_INT);
        $query->bindValue(':title',$this->course->title(), PDO::PARAM_STR);
        $query->bindValue(':price',$this->course->price(), PDO::PARAM_INT);
        $query->bindValue(':prof', $this->course->prof(), PDO::PARAM_STR);
        $query->bindValue(':class_id',$this->course->class_id(), PDO::PARAM_INT);
        $query->bindValue(':field_id', $this->course->field(), PDO::PARAM_INT);
        $query->bindValue(':descriptionCrs', $this->course->description(), PDO::PARAM_STR);
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
     public function update(String $title,String $price,String $prof,int $class_id,int $field,String $desc){
        $sql="UPDATE `Course` SET `title`=:title,`price`=:price],`prof_id`=;prof,`class_id`=:class_id,`field_id`=:field_id,`descriptionCourse`=:descriptionCrs WHERE `id`=:id;";
        $query->bindValue(':id', $this->course->id(), PDO::PARAM_INT);
        $query->bindValue(':title',$title, PDO::PARAM_STR);
        $query->bindValue(':price',$price, PDO::PARAM_INT);
        $query->bindValue(':prof', $prof, PDO::PARAM_STR);
        $query->bindValue(':class_id',$class_id, PDO::PARAM_INT);
        $query->bindValue(':field_id', $field, PDO::PARAM_INT);
        $query->bindValue(':descriptionCrs', $desc, PDO::PARAM_STR);
        $query->execute();
        return "La modification a été un succès";
     }
     public function delete(){
        $sql = "DELETE FROM `Course` WHERE `id`=:id;";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':id', $this->course->id(), PDO::PARAM_STR);
        $query->execute();
        return "Suppression effectuée";
     }
 }