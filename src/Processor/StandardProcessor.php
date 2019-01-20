<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Processor;

use AccessLogParser\Entity;
use AccessLogParser\Extension;

class StandardProcessor extends AbstractProcessor {

    const FILE_OPEN_MODE = 'r';

    /**
     * @param string $logFilePath
     * @return array
     */
    public function process($logFilePath) {
        $extensions = $this->_getExtensionsWithResponseIndex();

        $file = fopen($logFilePath, self::FILE_OPEN_MODE);
        while (!feof($file)) {
            $accessLog = $this->_prepareAccessLogEntity(fgets($file));
            if ($accessLog === null) {
                continue;
            }
            $this->_sendDataToExtensions($extensions, $accessLog);
            unset($accessLog);
        }
        fclose($file);

        return $this->_getResultFromExtensions($extensions);
    }

    /**
     * @return array
     */
    protected function _getExtensionsWithResponseIndex() {
        return [
            'views' => new Extension\Standard\ViewsCount(),
            'urls' => new Extension\Standard\UniqueUrls(),
            'traffic' => new Extension\Standard\TrafficSum(),
            'crawlers' => new Extension\Standard\CrawlersCounter(),
            'statusCodes' => new Extension\Standard\StatusCounter(),
        ];
    }

    /**
     * @return string
     */
    protected function _getAccessLogRegexTemplate() {
        return '/(?P<ip>.*?) (?P<remote_log_name>.*?) (?P<userid>.*?) \[(?P<date>.*?)(?= )' .
            ' (?P<timezone>.*?)\] \"(?P<request_method>.*?) (?P<path>.*?)(?P<request_version> HTTP\/.*)?\"' .
            ' (?P<status>.*?) (?P<length>.*?) \"(?P<referrer>.*?)\" \"(?P<user_agent>.*?)\"/';
    }

    /**
     * @return string
     */
    protected function _getAccessLogEntityClassName() {
        return Entity\Standard\AccessLog::class;
    }

    /**
     * @param Extension\AbstractExtension[] $extensions
     * @param Entity\AbstractEntity $entity
     */
    private function _sendDataToExtensions(array $extensions, Entity\AbstractEntity $entity) {
        foreach ($extensions as $extension) {
            $extension->process($entity);
        }
    }

    /**
     * @param Extension\AbstractExtension[] $extensions
     * @return array
     */
    private function _getResultFromExtensions(array $extensions) {
        $result = [];
        foreach ($extensions as $key => $extension) {
            $result[$key] = $extension->result();
        }
        return $result;
    }

    /**
     * @param string $line
     * @return Entity\Standard\AccessLog
     */
    private function _prepareAccessLogEntity($line) {
        $accessLogEntity = $this->_getAccessLogEntityClassName();
        return preg_match($this->_getAccessLogRegexTemplate(), $line,$matches)
            ? new $accessLogEntity($matches)
            : null;
    }
}