<?php

namespace ACMS\App\Classes\Users\User;
use ACMS\App\Classes\Users\Users as Users;

class User extends Users
{
    public function __construct($name, $lastname, $email, $login, $age, $psw)
    {
        parent::__construct($name, $lastname, $email, $login, $age, $psw);
    }

    public function getData(): array
    {
        return parent::getData(); // TODO: Change the autogenerated stub
    }
}