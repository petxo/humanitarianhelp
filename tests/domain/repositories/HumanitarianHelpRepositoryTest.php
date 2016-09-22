<?php


namespace Test\Domain\Repositories;

use \PHPUnit\Framework\TestCase;
use \App\Domain\Repositories\HumanitarianHelpRepository;

class HumanitarianHelpRepositoryTest extends TestCase
{
    public function testGetHelpByCountry()
    {
        $repo = new HumanitarianHelpRepository('http://datastore.iatistandard.org/api/1/access/activity.json');
        $data = $repo->getByCountry('SS');
        $this->assertNotNull($data);
        $this->assertNotCount(0, $data->{'iati-activities'});
    }
}
