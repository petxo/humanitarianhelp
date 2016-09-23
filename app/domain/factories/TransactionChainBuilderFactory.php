<?php
namespace App\Domain\Factories;

use \App\Domain\Factories\IatiTransactionChainBuilder;

class TransactionChainBuilderFactory{

    /**
    * Crea una instancia del Iati builder
    * @return ITransactionChainBuilder
    */
    public static function createIatiTransactionBuilder()
    {
        return new IatiTransactionChainBuilder();
    }
}
