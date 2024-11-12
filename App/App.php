<?php

namespace ACMS\App;
use ACMS\App\Classes\ACMSException\ACMSException;
use ACMS\App\Classes\Users\User\User as User;
use ACMS\App\Classes\DB\DB as DB;
use ACMS\App\Classes\Logger\Logger as Log;
class App
{
    public static bool $dbStatus = false;
    public static bool $appStatus = false;
    public static object $appLog;

    /**
     * @param bool $dbStatus
     */
    public static function setDbStatus(bool $dbStatus): void
    {

        self::$dbStatus = $dbStatus;
    }

    /**
     * @param bool $appStatus
     */
    public static function setAppStatus(bool $appStatus): void
    {
        self::$appStatus = $appStatus;
    }

    /**
     * @return bool
     */
    public static function isAppStatus(): bool
    {
        return self::$appStatus;
    }

    /**
     * @return bool
     */
    public static function isDbStatus(): bool
    {
        return self::$dbStatus;
    }

    static public function init(){
        self::$appLog = new Log("app.log");
        $db = new DB();
        if($db->getStatus()){
            self::isAppStatus(true);
            $admin = self::createAdmin("admin", "sample@mail.com", "1234", "Anton", "Latul", 31);
            self::$appLog->info("App init");
            return $admin->getData();
        }else{
            self::$appLog->error("DB not inited, admin user not created");
            Throw new ACMSException("DB not connect", 3);
        }
    }

    static public function createAdmin(string $login, $email, $psw, $name, $lastname, int $age){
        return new User($name, $lastname, $email,  $login, $age, $psw);
    }
}