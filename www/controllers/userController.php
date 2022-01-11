<?php

namespace app\controllers;

use app\models\user;

class userController extends Controller
{
    //This method is used to show the list of all users
    public function index(){
        $users = new User;

        $listUsers = $users->readUser(["userRole"=>"admin"]);

        var_dump($listUsers);

    }
}