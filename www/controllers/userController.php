<?php
/* @HBLog*/

namespace app\controllers;

use app\models\user;

class userController extends mainController
{
    //This method is used to show the list of all users
    public function usersList(){
        $users = new User;
        //Get the list of users with userRole = 'admin'
        $usersList = $users->readUser(["userRole"=>'user']);

        /* Call the render method of the main controller
        And render the list of users using the user view php file.
        compact('usersList) = ['usersList'=>$usersList]*/
        $this->render('users/userList.php',compact('usersList'));

    }

    public function readOneUser() {
        $users = new User;
        //Get the list of users with userRole = 'admin'
        $user = $users->readUser(["idUser"=>14]);

        /* Call the render method of the main controller */
        $this->render('users/oneUser.php',compact('user'));
    }
}

/* @HBLog*/