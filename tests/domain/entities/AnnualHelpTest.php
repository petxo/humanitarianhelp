<?php
namespace Test\Domain\Factories;

use \App\Domain\Entities\AnnualHelp;

class AnnualHelpTest extends \PHPUnit\Framework\TestCase
{
    public function testAggregateAmmount()
    {
        $annual = new AnnualHelp(2017);
        $annual->acumulateHelp("prueba", 5000);

        $this->assertEquals(5000, $annual->getAmmount("prueba"));

        $annual->acumulateHelp("prueba", 5000);
        $this->assertEquals(10000, $annual->getAmmount("prueba"));
    }
}

 ?>
