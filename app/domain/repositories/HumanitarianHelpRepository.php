<?php

namespace App\Domain\Repositories;

/**
* Repositorio remoto de la ayuda humanitaria
*/
class HumanitarianHelpRepository{

    private $_url_api;

    /**
    * Crea una instancia del repositorio
    * @param string $url_api Url de la api remota para obtener la información
    */
    function __construct($url_api){
        $this->_url_api = $url_api;
    }

    /**
    * Devuelve la url de la api remota donde se encuentra la información
    */
    public function getUrlApi(){
        return $this->_url_api;
    }

    /**
    * Devulve la ayuda humanitaria del pais solicitado
    * @param string $country Codigo ISO-Alpha2 del pais
    */
    public function getByCountry($country){
        return $this->execute(array('recipient-country'=>$country));
    }

    /**
    * Realiza la llamada a la api json
    */
    private function execute($params){
        $headers = array('Accept' => 'application/json');
        $response = \Unirest\Request::get($this->_url_api, $headers, $params);

        if ($response->code == 200){
            return $response->body;
        }
        else{
            throw new Exception("Error Processing Request", $response->code);
        }
    }
}
