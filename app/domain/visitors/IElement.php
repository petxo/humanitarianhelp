<?php

namespace App\Domain\Visitors;

interface IElement{

    /**
    * Metodo para que un elemento accepte un visitante
    */
    public function accept($visitor);
}

?>
