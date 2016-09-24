<?php
namespace Test\Domain\Factories;

use \App\Domain\Entities\AnnualHelpAggregateRoot;

class AnnualHelpAggregateRootTest extends \PHPUnit\Framework\TestCase
{
    public function testAggregateAmmount()
    {
        $aggregateRoot = AnnualHelpAggregateRoot::create();
        $aggregateRoot->addAmount(2016, "prueba", 5000);

        $this->assertEquals(5000, $aggregateRoot->getAnnualHelps()[2016]->getAmmount("prueba"));
    }
}

?>
