<?php
use ACMS\App\App as App;
if(file_exists(__DIR__.DIRECTORY_SEPARATOR.'autoload.php')){
    require_once "autoload.php";
    $app = new App();
    var_dump($app->getSum());
}else{
    die("Classloader not found");
}