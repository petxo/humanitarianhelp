<?php

namespace App\Domain\Repositories;

/**
* Repositorio remoto de la ayuda humanitaria
*/
class IatiHumanitarianHelpRepository extends ApiRepository implements IHumanitarianHelpRepository, IApiRepository{

    /**
    * Crea una instancia del repositorio
    * @param string $url_api Url de la api remota para obtener la información
    */
    function __construct($url_api){
        parent::__construct($url_api);
    }

    /**
    * Devulve la ayuda humanitaria del pais solicitado
    * @param string $country Codigo ISO-Alpha2 del pais
    */
    public function getByCountry($country){
        return parent::execute(array('recipient-country'=>$country));
    }


}
