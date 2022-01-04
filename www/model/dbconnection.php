<?php
    namespace app\model;

    use PDO;
    use PDOException;

    if (!isset($_ENV["HOST"])){
        require_once 'dbparameters.php';
        $_ENV['HOST']='mysql';
        $_ENV['DB']='webLinkFolderDB';
        $_ENV['PORT']='3306';
        $_ENV['USER']='root';
        $_ENV['PWD']='root';
    }else{
        echo 'KO.........';
    }

    //$x = $_ENV["HOST"];
    //$x = 'bbb';
    //var_dump($x);
    //echo $_ENV['HOST'];

    /* try {

        // We create a new instance of the class PDO
        $db = new PDO("mysql:host=".$_ENV["HOST"].";dbname=".$_ENV["DB"].";port=".$_ENV["PORT"], $_ENV["LOGIN"], $_ENV["PWD"]);

        //We want any issues to throw an exception with details, instead of a silence or a simple warning
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        // We instantiate an Exception object in $e so we can use methods within this object to display errors nicely
        echo $e->getMessage();
        exit;
    } */

    class DBConnectionParam
    {
        public static $HOST;
        public static $DB;
        public static $PORT;
        public static $DBUSER;
        public static $PASSWORD;
        public static $dsn;

        public function __construct($HOST,$DB,$PORT,$DBUSER,$PASSWORD,$dsn)
        {
            self::$HOST = $HOST;
            self::$DB = $DB;
            self::$PORT = $PORT;
            self::$DBUSER = $DBUSER;
            self::$PASSWORD = $PASSWORD;
            self::$dsn = $dsn;
        }

        public static function getArguments()
        {
            return 'mysql:host='.self::$HOST.';dbname='.self::$DB.';port='.self::$PORT;
        }
    } 

    //$dbparam = new DBConnectionParam($_ENV['HOST'],$_ENV["DB"],$_ENV["PORT"],$_ENV["USER"],$_ENV["PWD"],"satatic");

    //Single design pattern ------------------------------------------------- 
   class connectDB extends PDO
    {
        private static $instance;

        private function __construct(){

            //DSN (Data Source Name)
            $_dsn = new DBConnectionParam($_ENV['HOST'],$_ENV["DB"],$_ENV["PORT"],$_ENV["USER"],$_ENV["PWD"],"satatic");

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

        public static function getInstance() : self
        {
            if(self::$instance === null){
                self::$instance = new self();
            }

            return self::$instance;
        }

    }

    //var_dump(connectDB::getInstance());