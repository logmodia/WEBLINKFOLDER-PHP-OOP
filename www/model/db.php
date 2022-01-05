<?php
namespace app\model;
if (!isset($_ENV["HOST"])){
    require_once 'dbparameters.php';
}else{
    echo 'KO.........';
}

use PDO;
use PDOException;

/* Retrieve parameters from environment variables for database connection*/
class DBConnectionParam
    {
        public static $HOST;
        public static $DB;
        public static $PORT;
        public static $DBUSER;
        public static $PASSWORD;
        public static $dsn;

        public function __construct($HOST,$DB,$PORT,$DBUSER,$PASSWORD)
        {
            self::$HOST = $HOST;
            self::$DB = $DB;
            self::$PORT = $PORT;
            self::$DBUSER = $DBUSER;
            self::$PASSWORD = $PASSWORD;
        }

        public static function getArguments()
        {
            return 'mysql:host='.self::$HOST.';dbname='.self::$DB.';port='.self::$PORT;
        }
    } 

/* Connexion à une base MySQL avec l'invocation de pilote */
class DBConnex extends PDO
{

    private static $dbconnection;
    public static $db;

    private function __construct(){

        //DSN (Data Source Name)
        $_dsn = new DBConnectionParam($_ENV['HOST'],$_ENV["DB"],$_ENV["PORT"],$_ENV["USER"],$_ENV["PWD"]);

        try {
            parent::__construct($_dsn::getArguments(),$_dsn::$DBUSER,$_dsn::$PASSWORD);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8"); // MySQL statements in utf8 format
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // MySQL fetch mode will be an associative array
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Throw exception if error

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function getDBConnection(){
        if(self::$dbconnection === null){
            self::$dbconnection = new DBConnex; //Create an instance of DBConnex
        }
        return self::$dbconnection;
    }
}

