<?php
/* @HBLog*/
namespace app\controllers;

abstract class mainController
{
    public function render(string $viewFile, array $data=[],string $template = 'defaultView.php')
    {
        //Extract data from the array
        extract($data);

        //Start output buffer
        ob_start();

        //Build the view controller file path
        require_once $_SERVER['DOCUMENT_ROOT'].'/views/'.$viewFile;

        //Afeter generating de view, retrieve the view content stored in the buffer
        //This content will be used in the defaultView.php file
        $content = ob_get_clean();

        require_once $_SERVER['DOCUMENT_ROOT'].'/views/'.$template;
    }
}

/* @HBLog*/