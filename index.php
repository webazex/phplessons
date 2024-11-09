<?php
require_once "Classes".DIRECTORY_SEPARATOR."User.php";
$user = new User("Rendal", "w@mail.com", 30);
var_dump($user->getAll());