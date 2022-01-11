<?php
/* @HBLog*/

use app\autoloader;
use app\router\main;

//Using autoloader to load or import dynamically php files without the need of require_once
require_once 'autoloader.php';
autoloader::register(); //Register automatically create the require statement for the required php files

$router = new main;
$router->start();

/* @HBLog*/