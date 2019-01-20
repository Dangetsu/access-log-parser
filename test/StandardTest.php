<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */
namespace Test;

use AccessLogParser;
use AccessLogParser\Processor;

class StandardTest extends \PHPUnit_Framework_TestCase {

    public function testBuildStatistic() {
        $parser = new AccessLogParser\Application();
        $result = $parser->buildStatistic('standard_access.log', Processor\StandardProcessor::getInstance());

        $this->assertCount(5, $result);
        $this->assertSame(5, $result['views']);
        $this->assertSame(3, $result['urls']);
        $this->assertSame(17335, $result['traffic']);
        $this->assertSame(['google' => 4], $result['crawlers']);
        $this->assertSame([404 => 1, 200 => 4], $result['statusCodes']);
    }
}