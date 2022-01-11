<?php
    /* @HBLog*/

    namespace app\models;
    require_once 'querymodel.php';

    class user extends queryModel
    {
        protected $idUser;
        protected $userName;
        protected $email;
        protected $passW;
        protected $userRole;

        //private $result;
    
        public function readUser(array $data){
           return $this->findBy('users',$data);
        }

        public function createUser(array $data){
           return $this->createRecord('users',$data);
        }

        /*Create a user using hydration method---------------------------------------------------
        Caution : to use this method every property of the class must have a setter
        Grab and use the setter automatically */

        public function hydrationMethod(array $data){
            //Retrieve the setter method corresponding to the $key
            //userName --> setUsername
            foreach ($data as $key => $value) {
                $setter = 'set'.ucfirst($key);
                
                //Check if the setter exists
                if (method_exists($this,$setter)){
                    //Call the setter
                    $this->$setter($value);
                }
            }

            return $this;
        }

        
        /**
         * Get the value of idUser
         */ 
        public function getIdUser()
        {
            return $this->idUser;
        }

        /**
         * Get the value of username
         */ 
        public function getUserName()
        {
            return $this->userName;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($userName)
        {
            $this->userName = $userName;

            return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
            $this->email = $email;

            return $this;
        }

        /**
         * Get the value of userRole
         */ 
        public function getUserRole()
        {
            return $this->userRole;
        }

        /**
         * Set the value of userRole
         *
         * @return  self
         */ 
        public function setUserRole($userRole)
        {
            $this->userRole = $userRole;

            return $this;
        }

        /**
         * Get the value of passW
         */ 
        public function getPassW()
        {
            return $this->passW;
        }

        /**
         * Set the value of passW
         *
         * @return  self
         */ 
        public function setPassW($passW)
        {
            $this->passW = $passW;

            return $this;
        }
    }

    /* @HBLog*/