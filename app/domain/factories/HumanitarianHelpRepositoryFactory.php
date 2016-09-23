<?php
namespace App\Domain\Factories;
use \App\Domain\Repositories\IatiHumanitarianHelpRepository;

class HumanitarianHelpRepositoryFactory{

    /**
    * Crea una instancia del repositorio de la ayuda humanitaria
    */
    public static function createIatiRepository($url_api)
    {
        return new IatiHumanitarianHelpRepository($url_api);
    }
}
