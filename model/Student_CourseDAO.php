<?php
class Student_CourseDAO {
    private $connection;
    function __construct($connection){
        $this->connection=$connection;
    }
    public function insert($array){
        $sql = "INSERT INTO `Student_Course`(`idCourse`, `idStudent`, `start`) VALUES(:course,:student,curdate());";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':course', $array['course'], PDO::PARAM_INT);
        $query->bindValue(':student', $array['student'], PDO::PARAM_STR);
        $query->execute();

    }
    public function readById(int $value){
        $result=null;
        if(!empty($value)){
            $sql = "SELECT * FROM `Student_Course` WHERE `id`=:id ;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $value, PDO::PARAM_INT);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function readByStudent(String $value){
            $sql = "SELECT Course.*,`start`,`end` FROM `Student_Course`,`Course` WHERE `idStudent`=:id AND Course.id=idCourse ;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $value, PDO::PARAM_STR);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
    public function readByCourse(int $value){
        $result=null;
        if(!empty($value)){
            $sql = "SELECT * FROM `Student_Course` WHERE `idCourse`=:id ;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $value, PDO::PARAM_INT);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function end(int $id){
        if(!empty($value)){
            $sql = "UPDATE `Student_Course` SET `end`=curdate() WHERE `id`=:id;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
        }
    }
    public function delete($id){
        $sql = "DELETE FROM `Student_Course` WHERE `id`=:id;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
}