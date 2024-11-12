<?php

namespace ACMS\App\Classes\Users;

abstract class Users
{
    private string $login;
    private int $age;
    private string $name;
    private string $lastname;
    private string $email;
    private string $psw;

    public function __construct($name, $lastname, $email, $login, $age, $psw)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->login = $login;
        $this->age = $age;
        $this->psw = password_hash($psw, PASSWORD_DEFAULT);;
    }

    public function getData():array{
        return [
            'name' => (!empty($this->name))? $this->name : "Name not set",
            'lastname' => (!empty($this->lastname))? $this->lastname : "Lastname not set",
            'email' => (!empty($this->email))? $this->email : "Email not set",
            'login' => (!empty($this->login))? $this->login : "Login not set",
            'age' => (!empty($this->age))? $this->age : "Age not set",
        ];
    }
}