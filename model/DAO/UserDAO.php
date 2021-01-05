<?php

   class UserDAO{
       private $user;
       private static $connection;
       function __construct(User $user,$connection){
           $this->user = $user;
           self::$connection=$connection;
       }
       public function insert(){
        $sql = "INSERT INTO `App_User`(`email`, `lastname`, `firstname`, `roleUser`, `work`, `pwd`,`Inscription_date`) VALUES (:email,:lastname,:firstname,:roleUser,:work,:pwd,curdate());";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':email', $this->user->email(), PDO::PARAM_STR);
        $query->bindValue(':lastname',$this->user->lastname(), PDO::PARAM_STR);
        $query->bindValue(':firstname',$this->user->firstname(), PDO::PARAM_STR);
        $query->bindValue(':roleUser', $this->user->roleUser(), PDO::PARAM_STR);
        $query->bindValue(':work',$this->user->work(), PDO::PARAM_STR);
        $query->bindValue(':pwd', $this->user->pwd(), PDO::PARAM_STR);
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
       public function update(String $lastN,String $firstN,String $rol,String $work,String $pwd){
            $sql="UPDATE `App_User` SET `lastname`=:lastN,`firstname`=:firstN,`roleUser`=:rol,`work`=:work,`pwd`=:pwd WHERE `email`=:email;";
            $query->bindValue(':lastN',$lastN, PDO::PARAM_STR);
            $query->bindValue(':firstN',$firstN, PDO::PARAM_STR);
            $query->bindValue(':rol', $rol, PDO::PARAM_STR);
            $query->bindValue(':work',$work, PDO::PARAM_STR);
            $query->bindValue(':pwd', $pwd, PDO::PARAM_STR);
            $query->bindValue(':email', $this->user->email(), PDO::PARAM_STR);
            $query->execute();
            return "La modification a été un succès";
        }
       public function updateEmail($email){
        $researchArray = $this->readByEmail($email);
        if(empty($researchArray)){
            $sql = "UPDATE `App_User` SET `email`=:val WHERE `email`=:email;";
            $query->bindValue(':val', $email, PDO::PARAM_STR);
            $query->bindValue(':email', $this->user->email(), PDO::PARAM_STR);
            $query = self::$connection->prepare($sql);
            $query->execute();
            return "Email mis à jour";
        }
        return "Ce email existe déjà pour un compte";

       }
       public function delete(){
        $sql = "DELETE FROM `App_User` WHERE `email`=:email;";
        $query = self::$connection->prepare($sql);
        $query->bindValue(':email', $this->user->email(), PDO::PARAM_STR);
        $query->execute();
        return "Suppression effectuée";
       }
   }