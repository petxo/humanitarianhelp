<?php
namespace Test\Cache;

use \App\Cache\FastCache;

class FastCacheTest extends \PHPUnit\Framework\TestCase
{
    public function testAddKey()
    {
        FastCache::getInstance()->set('key','value',5);
        $value = FastCache::getInstance()->get('key');
        $this->assertEquals('value',$value);
    }
}

 ?>
