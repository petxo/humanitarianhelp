<?php
namespace Test\Domain\Factories;

use \App\Domain\Factories\HumanitarianHelpRepositoryFactory;
use \App\Domain\Repositories\IHumanitarianHelpRepository;

class HumanitarianHelpRepositoryFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateIatiRepository()
    {
        $url_api = 'http://localhost';
        $repository = HumanitarianHelpRepositoryFactory::createIatiRepository($url_api);
        $this->assertNotNull($repository);
        $this->assertInstanceOf(IHumanitarianHelpRepository::class, $repository);
        $this->assertEquals($repository->getUrlApi(), $url_api);
    }
}

 ?>
