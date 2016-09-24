<?php
namespace App\Domain\Translators;

class TransactionIatiTranslator implements ITranslator{

    /**
    * Realiza la traducción de la entidad transaccion de Iati a
    * la entidad Transacción
    * @param stdClass $iati_trasanction Entidad de la transaccion de Iati
    * @param Transaction $transaccion Entidad de transaccion del dominio
    */
    public function translate($iati_trasanction, &$transaction){
        $transaction->setProvider($iati_trasanction->{'provider-org'});
        $transaction->setCurrency($iati_trasanction->value->currency);
        $transaction->setValue((float)$iati_trasanction->value->text);
        $transaction->setDate($iati_trasanction->value->{'value-date'});
    }
}

?>
