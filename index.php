<?php
use ACMS\App\Classes\Users\User\User as User;
try {
    require_once "autoload.php";
    $user = new User();
} catch (\ACMS\App\Classes\ACMSException\ACMSException $e){
    echo '<pre>';
    print_r([
        'code' => $e->getCode(),
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
    ]);
    echo '</pre>';
}