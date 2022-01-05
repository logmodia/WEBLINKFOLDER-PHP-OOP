<?php
namespace app\model;
require_once 'db.php';

//Retrieve database from DBConnex class and set the query, prepare and execute
class queryModel extends DBConnex
{
    private static function getDB(){
        $db = DBConnex::getDBConnection();
        return $db;
    }

    public static function setquery(string $sql, array $attributes = null){
        $query = self::getDB()->prepare($sql);
        $query->execute($attributes);

        //$data= $query->fetchAll();

        return $query;
    }

}
