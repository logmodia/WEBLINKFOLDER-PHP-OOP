<?php
namespace app\model;
require_once 'querymodel.php';

class user extends queryModel
{
    protected $idUser;
    protected $username;
    protected $email;
    protected $passW;
    protected $userRole;
    private $result;

    public function __construct($userName, $email,$passW, $userRole)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->passW = $passW;
        $this->userRole = $userRole;

        //$this->result = querymodel::setquery("SELECT * FROM users")->fetch();

    }

    //Read data from the user table ---------------------------------------------
    public static function findBy(array $parameters){
        //set request criteria
        //Example: 'Select * From Users Where userRole = ?, "admin"'
        $columns=[];
        $values=[];

        //Separate columns from values in two diffrent arrays to match the query parameters structure
        foreach($parameters as $column => $value){
            $columns[] = "$column = ?";
            $values[] = "$value";
        }

        $criteria = implode(" AND ",$columns); //Convert the column array into string : userRole = ?

        $reqFindBy = "SELECT * FROM users WHERE $criteria";
        $resFindBy = querymodel::setquery($reqFindBy,$values)->fetchAll(); //1st argument : 'Select * From Users Where userRole = ?, 2nd argument : userRole = ?
        return $resFindBy;
    }

    //Creating a new user--------------------------------------------------------------------------------    
    public static function createuser(user $user){

        //set request criteria
        //Example: 'INSERT INTO Users (userName,email,passW,userRole) VALUES(?,?,?,?)';
        $columns=[];
        $paramMark=[]; // ?
        $values=[];

        //Separate columns from values in two diffrent arrays to match the query parameters structure
        foreach($user as $column => $value){
            if ($column!==null && ($column === 'userName' OR $column === 'email' OR $column === 'passW' OR $column === 'userRole')){

                $columns[] = $column;
                $paramMark[] = "?";
                $values[] = "$value";
            }
        }

        $columnsList = implode(", ",$columns); //Convert the column array into string
        $paramMarkList = implode(",",$paramMark); //Convert the paramMark array into string
        $valuesList = implode(",",$values); //Convert the values array into string

        $reqInsertUser = "INSERT INTO users ($columnsList) VALUES ($paramMarkList)";
        $reqInsertUser = querymodel::setquery($reqInsertUser,$values); //1st argument : 'INSERT INTO Users (userName,email,passW,userRole) VALUES(?,?,?,?), 2nd argument : Values
      
    }

}