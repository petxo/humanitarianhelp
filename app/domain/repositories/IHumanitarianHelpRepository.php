<?php
namespace App\Domain\Repositories;

interface IHumanitarianHelpRepository{

    /**
    * Devulve la ayuda humanitaria del pais solicitado
    * @param string $country Codigo ISO-Alpha2 del pais
    */
    public function getByCountry($country);
}

 ?>
