<?php
    /* @HBLog*/

    namespace app\models;
    require_once 'database/db.php';

    use app\database\DBConnex;

    //Retrieve database from DBConnex class and set the query, prepare and execute
    class queryModel extends DBConnex
    {
        private function getDB(){
            $db = DBConnex::getDBConnection();
            return $db;
        }

        private function setquery(string $sql, array $attributes = null){
            $query = $this->getDB()->prepare($sql);

            if ($attributes !== null){
                $query->execute($attributes);

            }else{

            }

            //$data= $query->fetchAll();

            return $query;
        }

        /*Read data from the table ----------------------------------------------------------------------
        $parameters : ['column'=>'value','column'=>'value',...]*/
        protected function findBy($table,array $parameters){
            //set sql structure
            //Example: 'Select * From table Where column = ?, "value"'
            $columns=[];
            $values=[];

            //Separate columns from values in two diffrent arrays to match the query parameters structure
            foreach($parameters as $column => $value){
                $columns[] = "$column = ?";
                $values[] = "$value";
            }

            $criteria = implode(" AND ",$columns); //Convert the column array into string : userRole = ? AND column2 = ? ...

            $reqFindBy = "SELECT * FROM $table WHERE $criteria";
            $resultFindBy = $this->setquery($reqFindBy,$values)->fetchAll(); //1st argument : 'Select * From Users Where userRole = ?, 2nd argument : userRole = ?
            
            return $resultFindBy;
        }

        //Create a new record--------------------------------------------------------------------------------    
        protected function createRecord($table,array $parameters){

            //set request structure
            //Example: 'INSERT INTO table (column1,column2 ,column3,column4) VALUES(?,?,?,?)';
            $columns=[];
            $paramMark=[]; // ?
            $values=[];

            //Separate columns from values in two diffrent arrays to match the query parameters structure
            foreach($parameters as $column => $value){
                if ($column!==null){

                    $columns[] = $column;
                    $paramMark[] = "?";
                    $values[] = "$value";
                }
            }

            $columnsList = implode(", ",$columns); //Convert the column array into string
            $paramMarkList = implode(",",$paramMark); //Convert the paramMark array into string

            $reqInsertUser = "INSERT INTO $table ($columnsList) VALUES ($paramMarkList)";
            $reqInsertUser = $this->setquery($reqInsertUser,$values); //1st argument : 'INSERT INTO table (column1,column2,column4) VALUES(?,?,?,?), 2nd argument : Values
            
            return $reqInsertUser;
        }

        //Update a table--------------------------------------------------------------------------------    
        protected function updateRecord($table,int $id,array $parameters){

            //set request criteria
            //Example: 'UPDATE table SET column1=?,column2=?,column3=?,column4=? WHERE column = ?';
            $columns=[];
            $values=[];

            //Separate columns from values in two diffrent arrays to match the query parameters structure
            foreach($parameters as $column => $value){
                if ($column!==null){

                    $columns[] = "$column = ?";
                    $values[] = "$value";
                }
            }

            $values[] =$id;
            $columnsList = implode(", ",$columns); //Convert the column array into string

            $reqUpDateUser = "UPDATE $table SET $columnsList WHERE $id = ?";
            $resultReq = $this->setquery($reqUpDateUser,$values); 

            return $resultReq;
        }

        //Delete a user--------------------------------------------------------------------------------    
        protected function deleteRecord($table,int $id){

            $values[] =$id;

            $reqDelete = "DELETE FROM $table WHERE $id = ?";
            $resultReq = $this->setquery($reqDelete,$values); 

            return $resultReq;
        }

    }

    /* @HBLog*/
