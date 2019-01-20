<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser;

class Application {

    /**
     * @param string $logFilePath
     * @param Handler\Processor $processor
     * @return mixed
     * @throws Exception\ExistenceLogFileError
     */
    public function buildStatistic($logFilePath, Handler\Processor $processor) {
        if (!file_exists($logFilePath) || !is_readable($logFilePath)) {
            throw new Exception\ExistenceLogFileError('Access.log file not exists or not readable!');
        }
        return $processor->process($logFilePath);
    }

    /**
     * @param array $data
     * @param Handler\Format $format
     * @return mixed
     */
    public function format(array $data, Handler\Format $format) {
        return $format->convert($data);
    }
}