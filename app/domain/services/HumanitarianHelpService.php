<?php

namespace App\Domain\Services;
use \App\Domain\Repositories\IHumanitarianHelpRepository;
use \App\Cache\ICacheStorage;

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

    const HELP_BY_COUNTRY = "HELP_BY_COUNTRY";

    /**
    * Crea una instancia del servicio de ayuda humanitaria
    * @param HumanitarianHelpRepository $repository Repositio de la ayuda humanitaria
    * @param ICacheStorage $cache Alamcen de cache
    */
    public function __construct(IHumanitarianHelpRepository $repository,
                                ICacheStorage $cache,
                                ITransactionChainBuilder $chainBuilder){
        $this->_repository = $repository;
        $this->_cache = $cache;
        $this->_chainBuilder = $chainBuilder;
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


    }
}

?>
