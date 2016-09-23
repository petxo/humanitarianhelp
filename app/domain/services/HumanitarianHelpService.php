<?php

namespace App\Domain\Services;
use \App\Domain\Repositories\IHumanitarianHelpRepository;
use \App\Cache\ICacheStorage;

/**
* Service que gestiona la información de la ayuda humanitaria
*/
class HumanitarianHelpService{

    private $_repository;
    private $_cache;

    const HELP_BY_COUNTRY = "HELP_BY_COUNTRY";

    /**
    * Crea una instancia del servicio de ayuda humanitaria
    * @param HumanitarianHelpRepository $repository Repositio de la ayuda humanitaria
    * @param ICacheStorage $cache Alamcen de cache
    */
    public function __construct(IHumanitarianHelpRepository $repository, ICacheStorage $cache){
        $this->_repository = $repository;
        $this->_cache = $cache;
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
        

    }
}

?>
