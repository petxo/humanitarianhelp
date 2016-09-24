<?php
namespace App\Domain\Visitors;

use \App\Domain\Entities\AnnualHelpAggregateRoot;

class TransactionVisitor implements IVisitor{

    public static function create(){
        $aggregateRoot = AnnualHelpAggregateRoot::create();
        return new static($aggregateRoot);
    }

    /**
    * @var AnnualHelpAggregateRoot
    */
    private $_aggregateRoot;

    private function __construct($aggregateRoot){
        $this->_aggregateRoot = $aggregateRoot;
    }

    /**
    * Metodo para visitar a la trasacciones e ir acumulando los valores
    * @param Transaction $element
    */
    public function visit($element){
        $element->accept($this);
        if ($element->hasNext()){
            $this->visit($element->getNext());
        }
    }

    /**
    * Devuelve el aggregador de la ayuda
    * @return AnnualHelpAggregateRoot
    */
    public function getAggregate(){
        return $this->_aggregateRoot;
    }
}

?>
