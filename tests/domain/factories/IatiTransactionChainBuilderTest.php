<?php
namespace Test\Domain\Factories;

use \App\Domain\Factories\IatiTransactionChainBuilder;

class IatiTransactionChainBuilderTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateIatiChain()
    {
        $response = json_decode(file_get_contents(dirname(__FILE__).'../../samples/response.json'));

        $builder = new IatiTransactionChainBuilder();
        $chain = $builder->build($response-> $response->{'iati-activities'});
        $this->assertNotNull($chain);
    }
}

?>
