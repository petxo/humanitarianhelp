<?php

namespace App\Logging;

use \App\Configuration;

class LoggerManager
{
    private static $logger;

    public static function getLogger()
    {
        if (null === static::$logger) {
            static::$logger = new \Monolog\Logger('app_logger');
            $log_file = dirname(__FILE__).Configuration::getInstance()->getConfig()['log_dir'];
            $file_handler = new \Monolog\Handler\StreamHandler($log_file);
            static::$logger->pushHandler($file_handler);
        }

        return static::$logger;
    }
}

?>
