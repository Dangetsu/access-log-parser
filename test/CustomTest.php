<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */
namespace Test;

use AccessLogParser;
use Test\Custom;
use AccessLogParser\Format;

class CustomTest extends \PHPUnit_Framework_TestCase {

    public function testBuildStatisticWithCustomProcessor() {
        $parser = new AccessLogParser\Application();
        $result = $parser->buildStatistic('custom_access.log', new Custom\CustomProcessor());

        $this->assertCount(5, $result);
        $this->assertSame(5, $result['views']);
        $this->assertSame(5, $result['urls']);
        $this->assertSame(5, $result['ips']);
        $this->assertSame([], $result['crawlers']);
        $this->assertSame([200 => 5], $result['statusCodes']);

        $json = $parser->format($result, new Format\Json());
        $this->assertSame('{"views":5,"urls":5,"crawlers":[],"statusCodes":{"200":5},"ips":5}', $json);
    }
}