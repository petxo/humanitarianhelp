<?php

namespace App\Domain\Specifications;
use \App\Logging\LoggerManager;

class DisbursementTransactionSpec implements ISpecification{

    /**
    * Comprueba si una transaction es de desembolso
    * @param Transaction $candidate
    * @return Cierto si la transaccion es del tipo desembolso, falso en
    * caso contrario
    */
    public function isSatisfiedBy($candidate){
        if (property_exists($candidate,'transaction-type')){
            return $candidate->{'transaction-type'}->code == "D";
        }
        LoggerManager::getLogger()->addInfo("Transaccion sin tipo");
        LoggerManager::getLogger()->addInfo(json_encode($candidate));
        return false;
    }
}

?>
