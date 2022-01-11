<?php
namespace app\model;

class Folder
{
    public $idFolder = 'My data';
    public $idFolderParent;
    public $idUser;
    public $folderName;
    public $creatDate;
    public $descript;
    public $folderAcess;

    static $newFolder;

    public function __construct(){
        return $this->idFolder;
    }

    public static function getFolder(){
        
        self::$newFolder = new Folder;
        return self::$newFolder;
    }
    
}

class xclass extends Folder
{
    public function data(){
        return Folder::getFolder();
    }
}

$newXclass = new Xclass;

var_dump($newXclass);

var_dump($_GET);