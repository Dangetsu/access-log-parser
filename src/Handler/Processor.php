<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Handler;

interface Processor {

    /**
     * @param string $logFilePath
     * @return array
     */
    public function process($logFilePath);

}