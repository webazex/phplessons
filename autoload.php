<?php
spl_autoload_register(function ($str){
    if(stripos($str, "ACMS\\") == 0){
        $cleanStr = str_replace("ACMS\\", "", $str);
        //if traits
        if(str_contains($cleanStr, "Trait")){
            require_once "App".DIRECTORY_SEPARATOR."Traits".DIRECTORY_SEPARATOR.$cleanStr.'.php';
        }else{
            require_once str_replace("\\", DIRECTORY_SEPARATOR, $cleanStr).".php";
        }

    }
});