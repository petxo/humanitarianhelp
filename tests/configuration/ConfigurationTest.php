<?php
namespace Test\Configuration;

use \App\Configuration;

class ConfigurationTest extends \PHPUnit\Framework\TestCase
{
    public function testGetInstance()
    {
        $config = Configuration::getInstance();
        $this->assertNotNull($config);
        $this->assertNotNull($config->getConfig()['iati_url']);
    }
}

?>
