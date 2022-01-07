<?php
namespace app\model;

class folder
{
    public $idFolder = 'My data';
    public $idFolderParent;
    public $idUser;
    public $folderName;
    public $creatDate;
    public $descript;
    public $folderAcess;

    public function __construct(){
        return $this->idFolder;
    }

    public function getFolder(){
        $newFolder = new Folder;
    }
    
}

class xclass extends Folder
{
    public function data(){
        return $this->getFolder();
    }
}

$newXclass = new Xclass;

var_dump($newXclass);