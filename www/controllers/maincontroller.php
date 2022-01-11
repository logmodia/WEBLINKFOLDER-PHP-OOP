<?php

namespace app\controllers;

class mainController extends Controller
{
    public function index(){
        include_once $_SERVER['DOCUMENT_ROOT'].'/view/mainView.php';
    }
}