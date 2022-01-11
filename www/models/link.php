<?php
namespace app\model;

class link
{
    public $idLink;
    public $idFolder;
    public $link;
    public $linkDescript;
}

$arr = [1,2,3,4,5];

echo array_reduce($arr,fn($varE,$varD)=> $varE + $varD);

echo '</br>';

foreach($arr as $key=>$value){
    echo $value+$value;
}