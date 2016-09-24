<?php
namespace App\Domain\Translators;
use \App\Logging\LoggerManager;

class AggregateTranslator implements ITranslator{

    public function translate($aggregate, &$dto){

        foreach ($aggregate->getAnnualHelps() as $year => $acumulate) {
            $dto[$year] = array();
            foreach ($acumulate->getProviders() as $provider => $amount) {
                $dto[$year][$provider] = $amount;
            }
        }
    }
}

?>
