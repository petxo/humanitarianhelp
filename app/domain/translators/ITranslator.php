<?php

namespace App\Domain\Translators;

interface ITranslator{

    /**
    * Realiza la traducción de una entidad a otra
    * @param mixed $source Entidad de origen
    * @param mixed $destination Entidad de destino
    */
    public function translate($source, $destiantion);

}


?>
