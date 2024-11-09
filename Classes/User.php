<?php

class User
{
    private string $name;
    private string $email;
    private int $age;

    public function __call(string $name, array $arguments)
    {

    }

    public function getAll():array {

    }
}