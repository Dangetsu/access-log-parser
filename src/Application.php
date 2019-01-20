<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser;

use AccessLogParser\Format;
use AccessLogParser\Processor;

class Application {

    /**
     * @param string $logFilePath
     * @param Processor\AbstractProcessor $processor
     * @return mixed
     * @throws Exception\ExistenceLogFileError
     */
    public function buildStatistic($logFilePath, Processor\AbstractProcessor $processor) {
        if (!file_exists($logFilePath) || !is_readable($logFilePath)) {
            throw new Exception\ExistenceLogFileError('Access.log file not exists or not readable!');
        }
        return $processor->process($logFilePath);
    }

    /**
     * @param array $data
     * @param Format\AbstractFormat $format
     * @return mixed
     */
    public function format(array $data, Format\AbstractFormat $format) {
        return $format->convert($data);
    }
}