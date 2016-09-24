<?php

namespace App\Domain\Entities;

use \App\Domain\Visitors\IElement;

class Transaction implements IElement{

    private $_provider;
    private $_currency;
    private $_value;
    private $_date;
    private $_next;
    private $_previous;

    public function __construct(){
        $this->_currency = 'EUR';
        $this->_value = 0;
        $this->_date = '1-1-1';
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
        return $this->_currency;
    }

    /**
    * Establece la moneda que ha realizado la transacción
    * @param string $value Nombre de la moneda
    */
    public function setCurrency($value){
        $this->_currency = $value;
    }

    /**
    * Devuelve el valor de la transacción
    */
    public function getValue(){
        return $this->_value;
    }

    /**
    * Establece el valor de la transacción
    * @param integer $value Valor de la transacción
    */
    public function setValue($value){
        $this->_value = $value;
    }

    /**
    * Devuelve la fecha de la transacción
    */
    public function getDate(){
        return $this->_date;
    }

    /**
    * Establece la fecha de la transacción
    * @param string $value Valor de la transacción
    */
    public function setDate($value){
        $this->_date = $value;
    }

    /**
    * Devuelve la siguiente transacción
    * @return Transaction
    */
    public function getNext(){
        return $this->_next;
    }

    /**
    * Establece la siguiente transacción
    * @param Transaction $value Valor de la transacción
    */
    public function setNext($value){
        $this->_next = $value;
    }

    /**
    * Indica si tiene asociado un elemento siguiente en la cadena
    */
    public function hasNext(){
        return !is_null($this->_next);
    }

    /**
    * Devuelve la anterior transacción
    * @return Transaction
    */
    public function getPrevious(){
        return $this->_previous;
    }

    /**
    * Establece la anterior transacción
    * @param Transaction $value Valor de la transacción
    */
    public function setPrevious($value){
        $this->_previous = $value;
    }

    /**
    * Indica si tiene asociado un elemento anterior en la cadena
    */
    public function hasPrevious(){
        return !is_null($this->_previous);
    }

    /**
    * Metodo para que un elemento accepte un visitante
    */
    public function accept($visitor){
        $visitor->getAggregate()->addAmount((int)substr($this->_date, 0, 4),
                                            $this->_provider,
                                            $this->_value);
    }
}

?>
