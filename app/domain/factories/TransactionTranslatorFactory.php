<?php
namespace App\Domain\Factories;

use \App\Domain\Translators\TransactionIatiTranslator;

class TransactionTranslatorFactory{

    /**
    * Crea una instancia del Iati builder
    * @return ITranslator
    */
    public static function createIatiTranslator()
    {
        return new TransactionIatiTranslator();
    }
}
