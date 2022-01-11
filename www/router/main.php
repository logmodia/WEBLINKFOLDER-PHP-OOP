<?php
namespace app\router;
use app\controllers\mainController;

class main
{
    public function start(){
        //Retrieve the URL
        $uri = $_SERVER['REQUEST_URI'];
        
        //Remove aventual trailing slash at the end of the URL if it exists
        if (!empty($url) && $url != '/' && $url[-1] === "/"){
            $uri = substr($uri, 0,-1);

            //Send a permanent redirect code
            http_response_code(301);

            //Redirect to the URL
            header('Location: '.$uri);
        }

        $params = [];
        if (isset($_GET['p'])){
            $params = explode('/', $_GET['p']);
        }
        
        //If there is at least one parameter retrieve controller by using the corresponding namespace
        if (count($params)!==0){
            //Remove the first element from the array so that the second parameter which is the controller becomes the first
            array_shift($params);
            //Build the controller name
            $controller = "\\app\\controllers\\".$params[0]."Controller";
            $controller = new $controller();
            
            //Retrieve the second parameter from the array
            array_shift($params);
            $action = (count($params) !== 0 )? $params[0]:'index';
            
            //Check if the methode in $action exist
            if (method_exists($controller, $action)){ 
                //If there are remaining parameters then add them as parameters of $action methode
                (isset($params[0]))? $controller->$action($params):$controller->$action();

            }else{
                http_response_code(404);
                echo 'This page does not exist';
            }

            
        }else{
            //If no parameters specified then call the default controller
            $mainController = new mainController;

            $mainController->index();

        }
    }
}