<?php

   class UserDAO{
       private $connection;
       function __construct($connection){
         $this->connection=$connection;
       }
       public function insert($array){
        $sql = "INSERT INTO `App_User`(`email`, `lastname`, `firstname`, `presentation`, `roleUser`, `work`, `pwd`,`Inscription_date`) VALUES (:email,:lastname,:firstname,:pre,:roleUser,:work,:pwd,curdate());";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':email', $array['email'], PDO::PARAM_STR);
        $query->bindValue(':lastname',$array['lastname'], PDO::PARAM_STR);
        $query->bindValue(':firstname',$array['firstname'], PDO::PARAM_STR);
        $query->bindValue(':pre',$array['presentation'], PDO::PARAM_STR);
        $query->bindValue(':roleUser', $array['roleUser'], PDO::PARAM_STR);
        $query->bindValue(':work',$array['work'], PDO::PARAM_STR);
        $query->bindValue(':pwd', $array['pwd'], PDO::PARAM_STR);
        $query->execute();
        return "Le compte a été bien créé";
       }
       public function readAll(){
        $sql = "SELECT * FROM `App_User` ORDER BY `Inscription_date`;";
        $query = $this->connection->prepare($sql);
        $query->execute();
        
       return $query->fetchAll(PDO::FETCH_ASSOC);
       }
       public function countProf(){
        $sql = "SELECT COUNT(*) as countP FROM `App_User` WHERE roleUser='prof';";
        $query = $this->connection->prepare($sql);
        $query->execute();    

       return $query->fetchAll(PDO::FETCH_ASSOC);
       }
       public function countStudents(){
        $sql = "SELECT COUNT(*) as countS FROM `App_User` WHERE roleUser='student';";
        $query = $this->connection->prepare($sql);
        $query->execute();    

       return $query->fetchAll(PDO::FETCH_ASSOC);
       }
       public function readByEmail(String $email){
        $result =null;
        if(!empty($email)){
            $sql = "SELECT * FROM `App_User` WHERE `email`=:email;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }

            return $result;
       }
       public function search($email,$pwd){
            $sql = "SELECT * FROM `App_User` WHERE `email`=:email AND `pwd`=:pwd ;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':pwd', $pwd, PDO::PARAM_STR);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
       }
       public function update($array){
            $sql="UPDATE `App_User` SET `lastname`=:lastN,`firstname`=:firstN,`presentation`=:pre,`roleUser`=:rol,`work`=:work,`pwd`=:pwd WHERE `email`=:email;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':lastN',$array['lastname'], PDO::PARAM_STR);
            $query->bindValue(':firstN',$array['firstname'], PDO::PARAM_STR);
            $query->bindValue(':pre',$array['presentation'], PDO::PARAM_STR);
            $query->bindValue(':rol', $array['roleUser'], PDO::PARAM_STR);
            $query->bindValue(':work',$array['work'], PDO::PARAM_STR);
            $query->bindValue(':pwd', $array['pwd'], PDO::PARAM_STR);
            $query->bindValue(':email', $array['email'], PDO::PARAM_STR);
            $query->execute();
            return "La modification a été un succès";
        }
       public function updateEmail($email,$old){
        $researchArray = $this->readByEmail($email);
        if(!empty($researchArray)){
            $sql = "UPDATE `App_User` SET `email`=:val WHERE `email`=:email;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':val', $email, PDO::PARAM_STR);
            $query->bindValue(':email', $old, PDO::PARAM_STR);
            $query->execute();
        }

       }
       public function updateBlocked($email,$val){
        $researchArray = $this->readByEmail($email);
        if(!empty($researchArray)){
            $sql = "UPDATE `App_User` SET `blocked`=:val WHERE `email`=:email;";
            $query = $this->connection->prepare($sql);
            $query->bindValue(':val', $val, PDO::PARAM_INT);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
        }

       }
       public function delete($email){
        $sql = "DELETE FROM `App_User` WHERE `email`=:email;";
        $query = $this->connection->prepare($sql);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        return "Suppression effectuée";
       }
   }