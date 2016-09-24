<?php
namespace App\Domain\Factories;
use \App\Configuration;
use \App\Cache\FastCache;
use \App\Domain\Services\HumanitarianHelpService;
use \App\Domain\Visitors\TransactionVisitor;
use \App\Domain\Translators\AggregateTranslator;

class HumanitarianHelpServiceFactory{

    /**
    * Crea una instancia del repositorio de la ayuda humanitaria
    */
    public static function createFromIati()
    {
        $repository = HumanitarianHelpRepositoryFactory::
                        createIatiRepository(Configuration::getInstance()->getConfig()['iati_url']);

        $cache = FastCache::getInstance();
        $chainBuilder = TransactionChainBuilderFactory::createIatiTransactionBuilder();
        $visitor = TransactionVisitor::create();
        $translator = new AggregateTranslator();
        return new HumanitarianHelpService($repository, $cache, $chainBuilder, $visitor, $translator);
    }
}
