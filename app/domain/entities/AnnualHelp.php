<?php

namespace App\Domain\Entities;


class AnnualHelp{

    private $_year;

    private $_providers;

    public function __construct($year){
        $this->_year = $year;
        $this->_providers = array();
    }

    public function getYear()
    {
        return $this->_year;
    }

    public function acumulateHelp($provider, $amount){
        if (!array_key_exists ($provider, $this->_providers))
        {
            $this->_providers[$provider] = 0;
        }
        $this->_providers[$provider] += $amount;
    }

    public function getAmmount($provider){
        return array_key_exists ($provider, $this->_providers)? $this->_providers[$provider] : 0;
    }

    public function getProviders(){
        return $this->_providers;
    }
}



 ?>
