<?php

    class Course_CustomerDAO{
        private $ccust;
        private static $connection;

        function __construct(Course_Customer $cc,$connection){
            $this->ccust=$cc;
            self::$connection=$connection;
        }
        public function insert(){
            $sql="INSERT INTO `Course_Customer`(`id`, `duration`, `customer_id`, `course_id`) VALUES (:id,:duration,:customer_id,:course_id);";
            $query = self::$connection->prepare($sql);
            $query->bindValue(':id', $this->ccust->id(), PDO::PARAM_INT);
            $query->bindValue(':duration',$this->ccust->duration(), PDO::PARAM_STR);
            $query->bindValue(':customer_id', $this->ccust->customerId(), PDO::PARAM_STR);
            $query->bindValue(':course_id',$this->ccust->courseId(), PDO::PARAM_INT);
            $query->execute();
        }
        public function readAll(){
            $sql="SELECT * FROM `Course_Customer`";
            $query = self::$connection->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function readByCustomerAndCourse(String $customer,int $course_id){
            $sql="SELECT * FROM `Course_Customer` WHERE `customer_id`=:customer_id AND `course_id` = :course_id";
            $query = self::$connection->prepare($sql);
            $query->bindValue(':customer_id', $this->ccust->customerId(), PDO::PARAM_STR);
            $query->bindValue(':course_id',$this->ccust->courseId(), PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function updateDuration(String $duration){
            $sql = "UPDATE `Course_Customer` SET `duration`=:val WHERE `id`=:id;";
            $query = self::$connection->prepare($sql);
            $query->bindValue(':val', $title, PDO::PARAM_STR);
            $query->bindValue(':id', $this->ccust->id(), PDO::PARAM_STR);
            $query->execute();
            return "la durée du cours a été bien changé";

        }
        public function delete(){
            $sql = "DELETE FROM `Course_Customer` WHERE `id`=:id;";
            $query = self::$connection->prepare($sql);
            $query->bindValue(':id', $this->ccust->id(), PDO::PARAM_INT);
            $query->execute();
            return "Suppression effectuée";
        }
    }