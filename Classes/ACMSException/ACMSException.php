<?php

namespace ACMS\Classes\ACMSException;

class ACMSException extends \Exception
{
    public function __construct($message = "ACMS Exception ", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}