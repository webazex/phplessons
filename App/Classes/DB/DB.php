<?php

namespace ACMS\App\Classes\DB;
use ACMS\App\Classes\Logger\Logger as Logger;
class DB
{
    private bool $status = false;
    public object $log;
    public function __construct()
    {
        $this->status = true;
        $this->log = new Logger();
        $this->log->info("Db connected");
    }

    public function getStatus(){
        $this->log->info("Getting data");
        return $this->status;
    }
}