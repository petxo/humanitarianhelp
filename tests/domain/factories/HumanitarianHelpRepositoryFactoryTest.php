<?php
namespace Test\Domain\Repositories;

class HumanitarianHelpRepositoryFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $factory = \App\Domain\Factories\HumanitarianHelpRepositoryFactory::createRepository('http://localhost');
        $this->assertNotNul($factory);
    }
}

 ?>
