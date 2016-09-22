<?php
namespace Test\Domain\Repositories;

use \App\Domain\Factories\HumanitarianHelpRepositoryFactory as HumanitarianHelpRepositoryFactory;
use \App\Domain\Repositories\HumanitarianHelpRepository as HumanitarianHelpRepository;

class HumanitarianHelpRepositoryFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $url_api = 'http://localhost';
        $repository = HumanitarianHelpRepositoryFactory::createRepository($url_api);
        $this->assertNotNull($repository);
        $this->assertInstanceOf(HumanitarianHelpRepository::class, $repository);
        $this->assertEquals($repository->getUrlApi(), $url_api);
    }
}

 ?>
