<?php
use ACMS\App\App as App;
use ACMS\App\Classes\ACMSException\ACMSException as ACMSException;
try {
    require_once "autoload.php";
    $adminUser = App::init();
    if(!empty($adminUser)){
        echo '<pre>';
        print_r($adminUser);
        echo '</pre>';
    }else{
        Throw new \ACMS\App\Classes\ACMSException\ACMSException("App admin not create", 1);
    }
} catch (\ACMS\App\Classes\ACMSException\ACMSException $e){
    echo '<pre>';
    print_r([
        'code' => $e->getCode(),
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
    ]);
    echo '</pre>';
}