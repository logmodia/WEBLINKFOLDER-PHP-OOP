<?php

namespace app\controllers;
use app\models\user;

class indexController extends mainController
{
    public function index(){
        //This method is used to show the list of all users
        $users = new User;
        //Get the list of users with userRole = 'admin'
        $usersList = $users->readUser(["userRole"=>'user']);

        /* Call the render method of the main controller
        And render the list of users using the user view php file.
        compact('usersList) = ['usersList'=>$usersList]*/
        $this->render('mainView.php',compact('usersList'),'home.php');
    }
}