<?php

namespace Test\Domain\Repositories;

use \App\Domain\Repositories\IatiHumanitarianHelpRepository;

class HumanitarianHelpRepositoryTest extends \PHPUnit\Framework\TestCase
{
    public function testGetHelpByCountry()
    {
        $this->markTestSkipped('must be revisited.');
        $repo = new IatiHumanitarianHelpRepository('http://datastore.iatistandard.org/api/1/access/activity.json');
        $data = $repo->getByCountry('SS');
        $this->assertNotNull($data);
        $this->assertNotCount(0, $data->{'iati-activities'});
    }
}
