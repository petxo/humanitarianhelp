<?php

namespace App;

class Configuration {

    private $_config;

    protected function __construct()
    {
        $string = file_get_contents(dirname(__FILE__).'/config.cfg');
        $this->_config = json_decode($string, true);
    }

    private static $instance;

    /**
    * Devuelve la instancia única de la configuración
    */
    public static function getInstance(){
        if (static::$instance === null){
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
    * Devuelve la configuración de la aplicación
    */
    public function getConfig(){
        return $this->_config;
    }
}

 ?>
