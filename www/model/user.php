<?php
namespace app\model;
require_once "requestmodel.php";
use app\model\requestmodel;

class user extends requestModel
{
    /* public $username;
    public $idUser;
    public $email;
    public $userName;
    public $passW;
    public $userRole; */

    public function __construct()
    {
        $this->table = 'users';
    }
}