<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */
namespace Test;

use AccessLogParser;
use AccessLogParser\Processor;
use AccessLogParser\Format;

class StandardTest extends \PHPUnit_Framework_TestCase {

    public function testBuildStatistic() {
        $parser = new AccessLogParser\Application();
        $result = $parser->buildStatistic('standard_access.log', new Processor\StandardProcessor());

        $this->assertCount(5, $result);
        $this->assertSame(5, $result['views']);
        $this->assertSame(3, $result['urls']);
        $this->assertSame(17335, $result['traffic']);
        $this->assertSame(['google' => 4], $result['crawlers']);
        $this->assertSame([404 => 1, 200 => 4], $result['statusCodes']);

        $json = $parser->format($result, new Format\Json());
        $this->assertSame('{"views":5,"urls":3,"traffic":17335,"crawlers":{"google":4},"statusCodes":{"404":1,"200":4}}', $json);
    }
}