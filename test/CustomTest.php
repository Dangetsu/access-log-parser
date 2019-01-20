<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */
namespace Test;

use AccessLogParser;
use Test\Custom;

class CustomTest extends \PHPUnit_Framework_TestCase {

    public function testBuildStatisticWithCustomProcessor() {
        $parser = new AccessLogParser\Application();
        $result = $parser->buildStatistic('custom_access.log', Custom\CustomProcessor::getInstance());

        $this->assertCount(5, $result);
        $this->assertSame(5, $result['views']);
        $this->assertSame(5, $result['urls']);
        $this->assertSame(5, $result['ips']);
        $this->assertSame([], $result['crawlers']);
        $this->assertSame([200 => 5], $result['statusCodes']);
    }
}