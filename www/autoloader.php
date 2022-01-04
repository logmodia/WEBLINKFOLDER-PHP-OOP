<?php

namespace app;

class autoloader
{
    static function register(){

        spl_autoload_register([__CLASS__,'autoload']);

    }

    static function autoload($class){
        //On récupère dans $class le namespace de la classe concernée
        //A partir de ce namespace on retrouver le chemin du fichier php contenant la classe
        $class = str_replace(__NAMESPACE__ .'\\','',$class); //on enlève app\ --> ex : model\user
        $class = str_replace('\\','/',$class); // on remplace le \ par / --> model/user
        $class= __dir__ . '/'.$class . '.php'; //on reconstitue le chemin d'accès à notre fichier php
        $phpFile = $class;

        if (file_exists($phpFile)){
            require_once $class; //on fait un petit require
        }
    }
}