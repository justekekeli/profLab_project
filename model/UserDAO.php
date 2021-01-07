<?php

   class UserDAO extends Database{

       function __construct(){
         parent::getInstance();
       }
       public function insert($array){
        $sql = "INSERT INTO `App_User`(`email`, `lastname`, `firstname`, `roleUser`, `work`, `pwd`,`Inscription_date`) VALUES (:email,:lastname,:firstname,:roleUser,:work,:pwd,curdate());";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':email', $array['email'], PDO::PARAM_STR);
        $query->bindValue(':lastname',$array['lastname'], PDO::PARAM_STR);
        $query->bindValue(':firstname',$array['firstname'], PDO::PARAM_STR);
        $query->bindValue(':roleUser', $array['roleUser'], PDO::PARAM_STR);
        $query->bindValue(':work',$array['work'], PDO::PARAM_STR);
        $query->bindValue(':pwd', $array['pwd'], PDO::PARAM_STR);
        $query->execute();
        return "Le compte a été bien créé";
       }
       public function readAll(){
        $sql = "SELECT * FROM `App_User` ORDER BY `Inscription_date`;";
        $query = self::$connection->prepare($sql);
        $query->execute();

       return $query->fetchAll(PDO::FETCH_ASSOC);
       }
       public function readByEmail(String $email){
        $result =null;
        if(!empty($email)){
            $sql = "SELECT * FROM `App_User` WHERE `email`=:email;";
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query = self::$connection->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
        }

            return $result;
       }
       public function update($array){
            $sql="UPDATE `App_User` SET `lastname`=:lastN,`firstname`=:firstN,`roleUser`=:rol,`work`=:work,`pwd`=:pwd WHERE `email`=:email;";
            $query->bindValue(':lastN',$array['lastname'], PDO::PARAM_STR);
            $query->bindValue(':firstN',$array['firstname'], PDO::PARAM_STR);
            $query->bindValue(':rol', $array['roleUser'], PDO::PARAM_STR);
            $query->bindValue(':work',$array['work'], PDO::PARAM_STR);
            $query->bindValue(':pwd', $array['pwd'], PDO::PARAM_STR);
            $query->bindValue(':email', $array['email'], PDO::PARAM_STR);
            $query->execute();
            return "La modification a été un succès";
        }
       public function updateEmail($email,$old){
        $researchArray = $this->readByEmail($email);
        if(empty($researchArray)){
            $sql = "UPDATE `App_User` SET `email`=:val WHERE `email`=:email;";
            $query->bindValue(':val', $email, PDO::PARAM_STR);
            $query->bindValue(':email', $old, PDO::PARAM_STR);
            $query = self::$connection->prepare($sql);
            $query->execute();
            return "Email mis à jour";
        }
        return "Ce email existe déjà pour un compte";

       }
       public function delete($email){
        $sql = "DELETE FROM `App_User` WHERE `email`=:email;";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        return "Suppression effectuée";
       }
   }