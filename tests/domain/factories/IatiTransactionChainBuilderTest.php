<?php
namespace Test\Domain\Factories;

use \App\Domain\Factories\IatiTransactionChainBuilder;
use \App\Domain\Factories\TransactionChainBuilderFactory;

class IatiTransactionChainBuilderTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateIatiChain()
    {
        $response = json_decode(file_get_contents(dirname(__FILE__).'/../../samples/response.json'));

        $builder = TransactionChainBuilderFactory::createIatiTransactionBuilder();
        $chain = $builder->build($response->{'iati-activities'});
        $this->assertNotNull($chain);
        $this->assertNotNull($chain->getNext());
    }
}

?>
