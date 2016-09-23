<?php

namespace App\Domain\Factories;
use \App\Domain\Entities\Transaction;
use \App\Domain\Factories\ITransactionChainBuilder;

class IatiTransactionChainBuilder implements ITransactionChainBuilder{

    /**
    * Devuelve una cadena de transaciones, con todas las transacciones efectuadas
    * por todas las organizaciones
    */
    public static function build($iati_activities){

    }

}

?>
