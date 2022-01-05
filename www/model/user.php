<?php
namespace app\model;
require_once 'querymodel.php';

class user extends queryModel
{
    /* public $username;
    public $idUser;
    public $email;
    public $userName;
    public $passW;
    public $userRole; */
    private $result;

    public function __construct()
    {
        
        $this->result = querymodel::setquery("SELECT * FROM users")->fetch();

    }

    public static function findBy(array $parameters){
        //set request criteria
        //Example: 'Select * From Users Where userRole = ?, "admin"'
        $columns=[];
        $values=[];

        //Separate columns from values in two differnt arrays to match the query parameters structure
        foreach($parameters as $column => $value){
            $columns[] = "$column = ?";
            $values[] = "$value";
        }

        $criteria = implode(" AND ",$columns); //Convert the column array into string : userRole = ?

        $reqFindBy = "SELECT * FROM users WHERE $criteria";
        $resFindBy = querymodel::setquery($reqFindBy,$values)->fetchAll(); //1st argument : 'Select * From Users Where userRole = ?, 2nd argument : userRole = ?
        return $resFindBy;
    }
}