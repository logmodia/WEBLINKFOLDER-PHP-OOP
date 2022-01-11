<?php

    namespace app\model;
    require_once "dbconnection.php";
    //use app\model\{connectDB};

    class requestModel extends connectDB
    {
        //Table of database
        protected $table;

        //Instance of connectDB
        private $db;

        //read data from database --------------------------------------
        public function readAll(){
            $query = $this->db->set_query('SELECT * FROM '.$this->table);
            return $query->fetchall();
        }

        //Setting the request, prepare and execute ----------------------
        public function set_query(string $sql, array $attributes)
        {
            //Retrieve the instance of connectDB
            $this->db = connectDB::getInstance();

            //Check if there are any attributes

            if ($attributes !== null){
                //Prepared request
                $query = $this->db->prepare($sql);
                $query->execute($attributes);

                return $query;

            }else{
                //simple request
                return $this->db->prepare($sql);
            }

        }
    }