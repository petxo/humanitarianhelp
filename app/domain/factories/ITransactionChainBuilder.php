<?php

namespace App\Domain\Factories;

interface ITransactionChainBuilder{

    /**
    * Devuelve una cadena de transaciones, con todas las transacciones efectuadas
    * por todas las organizaciones
    */
    public function build($data);

}

?>
