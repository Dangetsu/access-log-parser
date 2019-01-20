<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Processor;

abstract class AbstractProcessor {

    /**
     * @param string $logFilePath
     * @return array
     */
    abstract public function process($logFilePath);

    /**
     * @return static
     */
    public static function getInstance() {
        return new static();
    }
}