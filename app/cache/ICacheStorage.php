<?php

namespace App\Cache;

interface ICacheStorage{

    /**
    * Devueleve el objeto asociado a la clave
    * @param string $key Clave del objeto en la cache
    * @return mixed Objeto asociado a la clave
    */
    public function get($key);

    /**
    * Establece el objeto en la cache bajo la clave especificada
    * @param string $key Clave asociado al objeto
    * @param string $value Objeto a establecer en la cache
    * @param integer $time_expiration Tiempo de expiración de la clave
    */
    public function set($key, $value, $time_expiration);

    /**
    * Indica si la clave existe en la cache
    * @param string $key Clave del objeto
    * @return boolean Cierto si existe, falso en caso contrario
    */
    public function hasKey($key);

    /**
    * Elimina todas las claves del sitema de cache
    */
    public function clearAll();

    /**
    * Elimina una clave del sistema de cache
    * @param string $key Clave a eliminar de la cache
    */
    public function remove($key);

}

?>
