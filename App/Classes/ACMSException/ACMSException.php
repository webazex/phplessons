<?php

namespace ACMS\App\Classes\ACMSException;

class ACMSException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function warning($message){
        echo $message;
    }
}