<?php
require_once "Classes".DIRECTORY_SEPARATOR."ACMSException".DIRECTORY_SEPARATOR."ACMSException.php";
require_once "Classes".DIRECTORY_SEPARATOR."App.php";
try {
   \ACMS\Classes\App::test();
} catch (\ACMS\Classes\ACMSException\ACMSException $e) {
    $html = '<pre>';
    $html .= $e->getCode();
    $html .= "<br>";
    $html .= $e->getMessage();
    $html .= '</pre>';
    echo $html;
}