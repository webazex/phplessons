<?php
spl_autoload_register(function ($str){
    if(strpos($str, "ACMS\\") == 0){
        $cleanStr = str_replace("ACMS\\", '', $str);
        $fixedSlash = str_replace("\\", DIRECTORY_SEPARATOR, $cleanStr);
        if(file_exists($fixedSlash.".php")){
            require_once $fixedSlash.".php";
        }else{
            Throw new \ACMS\App\Classes\ACMSException\ACMSException("Class not found", 0);
        }
    }
});