<?php

namespace App\Domain\Services;
use \App\Domain\Repositories\IHumanitarianHelpRepository;
use \App\Cache\ICacheStorage;
use \App\Domain\Visitors\IVisitor;
use \App\Domain\Translators\ITranslator;
use \App\Domain\Factories\ITransactionChainBuilder;
use \App\Configuration;
use \App\Logging\LoggerManager;

/**
* Service que gestiona la información de la ayuda humanitaria
*/
class HumanitarianHelpService{

    /**
    * @var IHumanitarianHelpRepository
    */
    private $_repository;

    /**
    * @var ICacheStorage
    */
    private $_cache;

    /**
    * @var ITransactionChainBuilder
    */
    private $_chainBuilder;

    /**
    * @var IVisitor
    */
    private $_visitor;

    /**
    *
    */
    private $_translator;

    const HELP_BY_COUNTRY = "HELP_BY_COUNTRY";

    /**
    * Crea una instancia del servicio de ayuda humanitaria
    * @param HumanitarianHelpRepository $repository Repositio de la ayuda humanitaria
    * @param ICacheStorage $cache Alamcen de cache
    */
    public function __construct(IHumanitarianHelpRepository $repository,
                                ICacheStorage $cache,
                                ITransactionChainBuilder $chainBuilder,
                                IVisitor $visitor,
                                ITranslator $translator){
        $this->_repository = $repository;
        $this->_cache = $cache;
        $this->_chainBuilder = $chainBuilder;
        $this->_visitor = $visitor;
        $this->_translator = $translator;
    }

    /**
    * Devuelve la lista con la cantidad que han aportado las diferentes
    * organizaciones durante los ultimos 5 años.
    */
    public function getAggregate($country){
        $result = $this->_cache->get(self::HELP_BY_COUNTRY.'_'.$country);
        if (!is_null($result)){
            return $result;
        }

        //Obtenemos los datos del repositorio
        $data = $this->_repository->getByCountry($country);
        $chain = $this->_chainBuilder->build($data->{'iati-activities'});
        $this->_visitor->visit($chain);

        $result = array();
        $this->_translator->translate($this->_visitor->getAggregate(), $result);
        $this->_cache->set(self::HELP_BY_COUNTRY.'_'.$country, $result,
                        Configuration::getInstance()->getConfig()['cache_time']);
        LoggerManager::getLogger()->addInfo(json_encode($result));
        return $result;
    }
}

?>
