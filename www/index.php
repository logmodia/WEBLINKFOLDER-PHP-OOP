<?php

use app\autoloader;
use app\model\{user,folder,link,usersAccess,queryModel}; //Namespace group

//require_once 'model/users.php';
//require_once 'model/folder.php';
//require_once 'model/link.php';
//require_once 'model/usersaccess.php';

//on utilise notre autoloader pour charger ou importer dynamiquement les fichiers php sans utiliser le require_once
require_once 'autoloader.php';
autoloader::register(); //Register automatically create the require statement for the required php files

//$folder = new folder();
//$link = new link();
//$userAccess = new usersAccess();
$user1 = new user('mika4','mika4@gmail.com','mika40000','user');

echo '<pre>';
var_dump($user1::createuser($user1));
echo '</pre>';

echo '<pre>';
var_dump($user1::findBy(["userRole"=>"user"]));
echo '</pre>';

//var_dump($folder);
//var_dump($link);
//var_dump($userAccess);

?>

<?php
    include "view/footer.php";
?>