<?php

namespace App\Domain\Visitors;

interface IVisitor{

    /**
    * Metodo para visitar a un elemento
    */
    public function visit($element);
}


?>
