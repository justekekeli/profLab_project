<?php
    class User{
        private $email;
        private $lastname;
        private $firstname;
        private $roleUser;
        private $pwd;
        private $work;
        private $inscription;

        function __construct(String $email,String $lastname,String $firstname,String $roleUser,String $pwd,String $work){
                $this->email=$email;
                $this->lastname=$lastname;
                $this->firstname=$firstname;
                $this->roleUser=$roleUser;
                $this->pwd=$pwd;
                $this->work=$work;
        }

        public function email(){
            return $this->email;
        }
        public function lastname(){
            return $this->lastname;
        }
        public function firstname(){
            return $this->firstname;
        }

        public function roleUser(){
            return $this->roleUser;
        }

        public function pwd(){
            return $this->pwd;
        }
        public function work(){
            return $this->work;
        }

        public function setInscription($insc){
            $this->inscription=$insc;
        }
    }