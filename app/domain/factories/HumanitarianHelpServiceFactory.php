<?php
namespace App\Domain\Factories;
use \App\Configuration;
use \App\Domain\Repositories\HumanitarianHelpRepositoryFactory;

class HumanitarianHelpServiceFactory{

    /**
    * Crea una instancia del repositorio de la ayuda humanitaria
    */
    public static function createFromIati()
    {
        $repository = HumanitarianHelpRepositoryFactory::
                        createIatiRepository(Configuration::getInstance()->getConfig()['iati_url']);

        $cache = FastCache::getInstance();
        
        return new IatiHumanitarianHelpService($repository, $cache);
    }
}
