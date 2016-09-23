<?php

namespace App\Domain\Services;
use App\Domain\Repositories\IHumanitarianHelpRepository;

/**
* Service que gestiona la información de la ayuda humanitaria
*/
class HumanitarianHelpService{

    /**
    * Factory method, crea una instancia del servicio
    */
    public static function create(){
        return new HumanitarianHelpService();
    }

    private $repository;

    /**
    * Crea una instancia del servicio de ayuda humanitaria
    * @param HumanitarianHelpRepository $repository Repositio de la ayuda humanitaria
    */
    function __construct(IHumanitarianHelpRepository $repository){
        $this->repository = $repository;
    }

    /**
    * Devuelve la lista con la cantidad que han aportado las diferentes
    * organizaciones durante los ultimos 5 años.
    */
    public function getAggregate($country){

    }
}
 ?>
