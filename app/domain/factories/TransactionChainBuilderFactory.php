<?php
namespace App\Domain\Factories;

use \App\Domain\Factories\IatiTransactionChainBuilder;
use \App\Domain\Specifications\DisbursementTransactionSpec;
use \App\Domain\Specifications\TransactionActivitySpec;

class TransactionChainBuilderFactory{

    /**
    * Crea una instancia del Iati builder
    * @return ITransactionChainBuilder
    */
    public static function createIatiTransactionBuilder()
    {
        $translator = TransactionTranslatorFactory::createIatiTranslator();
        $spec = new DisbursementTransactionSpec();
        $activitySpec = new TransactionActivitySpec();
        return new IatiTransactionChainBuilder($translator, $spec, $activitySpec);
    }
}
