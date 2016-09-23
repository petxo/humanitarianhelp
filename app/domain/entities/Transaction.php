<?php

namespace App\Domain\Entities;

class Transaction {

    private $_provider;
    private $_currency;
    private $_value;
    private $_date;
    private $_next;

    public function __construct(){

    }

    /**
    * Devuelve la organización que ha realizado la transacción
    */
    public function getProvider(){
        return $this->_provider;
    }

    /**
    * Establece la organización que ha realizado la transacción
    * @param string $value Nombre de la organización
    */
    public function setProvider($value){
        $this->_provider = $value;
    }

    /**
    * Devuelve la moneda en la que ha se realizado la transacción
    */
    public function getCurrency(){
        return $this->$_currency;
    }

    /**
    * Establece la moneda que ha realizado la transacción
    * @param string $value Nombre de la moneda
    */
    public function setCurrency($value){
        $this->$_currency = $value;
    }

    /**
    * Devuelve el valor de la transacción
    */
    public function getValue(){
        return $this->$_value;
    }

    /**
    * Establece el valor de la transacción
    * @param integer $value Valor de la transacción
    */
    public function setValue($value){
        $this->$_value = $value;
    }

    /**
    * Devuelve la fecha de la transacción
    */
    public function getDate(){
        return $this->$_date;
    }

    /**
    * Establece la fecha de la transacción
    * @param string $value Valor de la transacción
    */
    public function setDate($value){
        $this->$_date = $value;
    }

    /**
    * Devuelve la siguiente transacción
    * @return Transaction
    */
    public function getNext(){
        return $this->$_next;
    }

    /**
    * Establece la siguiente transacción
    * @param Transaction $value Valor de la transacción
    */
    public function setNext(Transaction $value){
        $this->$_next = $value;
    }

}

?>
