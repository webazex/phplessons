<?php

namespace ACMS\Classes;

class App
{
    static function test():void {
        if(file_exists("Classes".DIRECTORY_SEPARATOR."User".DIRECTORY_SEPARATOR."User.php")){
            require_once "Classes".DIRECTORY_SEPARATOR."User".DIRECTORY_SEPARATOR."User.php";
            $user = new \ACMS\Classes\User\User("Rendal", "w@mail.com", 30);
            //$user->getAllData(); - Custom Exception method not found, code 2
            var_dump($user->getAll());
        }else{
            Throw new \ACMS\Classes\ACMSException\ACMSException(" Class not found", 1);
        }
    }
}