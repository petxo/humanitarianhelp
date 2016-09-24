<?php
namespace Test\Domain\Factories;

use \App\Domain\Translators\TransactionIatiTranslator;
use \App\Domain\Entities\Transaction;

class TransactionIatiTranslatorTest extends \PHPUnit\Framework\TestCase
{
    public function testTranslator()
    {
        $iati_activity = json_decode(file_get_contents(dirname(__FILE__).'/../samples/iati-activity.json'));

        $translator = new TransactionIatiTranslator();
        $transaction = new Transaction();
        $iati_trasanction = $iati_activity->transaction[0];

        $translator->translate($iati_trasanction, $transaction);

        $this->assertEquals($iati_trasanction->{'provider-org'}, $transaction->getProvider());
        $this->assertEquals($iati_trasanction->value->currency, $transaction->getCurrency());
        $this->assertEquals((float)$iati_trasanction->value->text, $transaction->getValue());
        $this->assertEquals($iati_trasanction->value->{'value-date'}, $transaction->getDate());
    }
}

?>
