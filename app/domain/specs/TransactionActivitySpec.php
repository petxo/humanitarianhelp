<?php

namespace App\Domain\Specifications;

class TransactionActivitySpec implements ISpecification{

    /**
    * Comprueba si una transaction es de desembolso
    * @param Transaction $candidate
    * @return Cierto si la transaccion es del tipo desembolso, falso en
    * caso contrario
    */
    public function isSatisfiedBy($candidate){
        return property_exists($candidate,'transaction');
    }
}

?>
