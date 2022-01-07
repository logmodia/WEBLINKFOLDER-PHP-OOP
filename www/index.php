<?php

use app\autoloader;
use app\model\{user,folder,link,usersAccess,queryModel}; //Namespace group

//require_once 'model/users.php';
//require_once 'model/folder.php';
//require_once 'model/link.php';
//require_once 'model/usersaccess.php';

//Using autoloader to load or import dynamically php files without the need of require_once
require_once 'autoloader.php';
autoloader::register(); //Register automatically create the require statement for the required php files

$user1 = new user();
//$data = ["userName"=>"mika12OK", "email"=>"mika12OK@gmail.com","passW"=>"mikaOK/000","userRole"=>"user"];

//$newUser = $user1->createUser($data);

echo '<pre>';
//var_dump($newUser);
//var_dump($user1::updateUser(23,$newUser));
//    $user1::deleteUser(27);
echo '</pre>';


echo '<pre>';
var_dump($user1->readUser(["userRole"=>"user"]));
echo '</pre>';

//var_dump($folder);
//var_dump($link);
//var_dump($userAccess);

?>

<?php
    include "view/footer.php";
?>