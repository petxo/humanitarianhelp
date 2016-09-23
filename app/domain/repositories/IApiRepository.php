<?php

namespace App\Domain\Repositories;

interface IApiRepository{
    /**
    * Devuelve la url de la api remota donde se encuentra la información
    */
    public function getUrlApi();
}

 ?>
