<?php

namespace App\Domain\Factories;
use \App\Domain\Entities\Transaction;
use \App\Domain\Factories\ITransactionChainBuilder;
use \App\Logging\LoggerManager;

class IatiTransactionChainBuilder implements ITransactionChainBuilder{

    /**
    * @var ITranslator
    */
    private $_translator;

    /**
    * @var ISpecification
    */
    private $_disbursementspec;

    /**
    * @var ISpecification
    */
    private $_activitySpec;

    public function __construct($translator, $disbursementspec, $activitySpec){
        $this->_translator = $translator;
        $this->_disbursementspec = $disbursementspec;
        $this->_activitySpec = $activitySpec;
    }

    /**
    * Devuelve una cadena de transaciones, con todas las transacciones efectuadas
    * por todas las organizaciones
    * @return Transaction Entidad de inicio de la cadena enlazada
    */
    public function build($iati_activities){
        $transaction = null;
        $previous_transaction = null;

        foreach ($iati_activities as $iati_activity){
            if ($this->_activitySpec->isSatisfiedBy($iati_activity->{'iati-activity'})){
                foreach ($iati_activity->{'iati-activity'}->transaction as $iati_trasanction){
                    if ($this->_disbursementspec->isSatisfiedBy($iati_trasanction)){

                        $previous_transaction = $transaction;
                        $transaction = new Transaction();
                        $this->_translator->translate($iati_trasanction, $transaction);

                        //Esto lo hacemos así porque estamos girando la cadena
                        //de manera que el ultimo será el primero
                        $transaction->setNext($previous_transaction);
                        if (!is_null($previous_transaction)){
                            $previous_transaction->setPrevious($transaction);
                        }
                    }
                }
            }
            else{
                LoggerManager::getLogger()->addInfo("Actividad sin Transaccion");
                LoggerManager::getLogger()->addInfo(json_encode($iati_activity));
            }
        }

        return $transaction;
    }
}

?>
