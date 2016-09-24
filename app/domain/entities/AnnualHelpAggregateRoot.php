<?php

namespace App\Domain\Entities;

class AnnualHelpAggregateRoot{

    public static function create(){
        return new static();
    }

    /**
    * @var AnnualHelp
    */
    private $_annualHelps;

    private function __construct(){
        $this->_annualHelps = array();
    }

    public function addAmount($year, $provider, $amount){
        if (!array_key_exists ($year, $this->_annualHelps))
        {
            $this->_annualHelps[$year] = new AnnualHelp($year);
        }

        $this->_annualHelps[$year]->acumulateHelp($provider, $amount);
    }

    public function getAnnualHelps(){
        return $this->_annualHelps;
    }
}

?>
