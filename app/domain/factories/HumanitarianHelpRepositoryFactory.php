<?php
namespace App\Domain\Factories;

class HumanitarianHelpRepositoryFactory{

    /**
    * Crea una instancia del repositorio de la ayuda humanitaria
    */
    public static function createRepository($url_api)
    {
        return new \App\Domain\Repositories\HumanitarianHelpRepository($url_api);
    }
}
