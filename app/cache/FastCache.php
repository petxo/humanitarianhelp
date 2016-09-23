<?php

namespace App\Cache;
use \phpFastCache\CacheManager;
use \App\Configuration;

class FastCache implements ICacheStorage{


    private static $instance;

    /**
    * Devuelve la instancia única de la configuración
    */
    public static function getInstance(){
        if (static::$instance === null){
            static::$instance = new static();
            CacheManager::setDefaultConfig(array(
                "path" => Configuration::getInstance()->getConfig()['cache_dir']
            ));
        }
        return static::$instance;
    }

    /**
    * Devueleve el objeto asociado a la clave
    * @param string $key Clave del objeto en la cache
    * @return mixed Objeto asociado a la clave
    */
    public function get($key){
        $item = CacheManager::getInstance('files')->getItem($key);
        return $item->get();
    }

    /**
    * Establece el objeto en la cache bajo la clave especificada
    * @param string $key Clave asociado al objeto
    * @param string $value Objeto a establecer en la cache
    * @param integer $time_expiration Tiempo de expiración de la clave
    */
    public function set($key, $value, $time_expiration){
        $item = CacheManager::getInstance('files')->getItem($key);
        $item->set($value)->expiresAfter($time_expiration);
        CacheManager::getInstance('files')->save($item);
    }

    /**
    * Indica si la clave existe en la cache
    * @param string $key Clave del objeto
    * @return boolean Cierto si existe, falso en caso contrario
    */
    public function hasKey($key){
        $item = CacheManager::getInstance('files')->getItem($key);
        return !is_null($item->get());
    }

    /**
    * Elimina todas las claves del sitema de cache
    */
    public function clearAll(){

    }

    /**
    * Elimina una clave del sistema de cache
    * @param string $key Clave a eliminar de la cache
    */
    public function remove($key){

    }

}

?>
