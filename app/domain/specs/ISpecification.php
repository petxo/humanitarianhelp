<?php

namespace App\Domain\Specifications;

interface ISpecification{

    /**
    * Comprueba si un candidato satisface una especificacion
    */
    public function isSatisfiedBy($candidate);
}

?>
