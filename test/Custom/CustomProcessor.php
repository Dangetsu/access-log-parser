<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test\Custom;

use AccessLogParser\Processor;

class CustomProcessor extends Processor\StandardProcessor {

    /**
     * @return string
     */
    protected function _getAccessLogRegexTemplate() {
        return '/(?P<host>.*?) (?P<ip>.*?) (?P<remote_log_name>.*?) (?P<userid>.*?) \[(?P<date>.*?)(?= )' .
            ' (?P<timezone>.*?)\] \"(?P<request_method>.*?) (?P<path>.*?)(?P<request_version> HTTP\/.*)?\"' .
            ' (?P<status>.*?) (?P<length>.*?) \"(?P<referrer>.*?)\" \"(?P<user_agent>.*?)\"/';
    }

    /**
     * @return string
     */
    protected function _getAccessLogEntityClassName() {
        return AccessLogEntity::class;
    }

    /**
     * @return array
     */
    protected function _getExtensionsWithResponseIndex() {
        $extensions = parent::_getExtensionsWithResponseIndex();
        unset($extensions['traffic']);
        $extensions['ips'] = new UniqueIpCountExtension();
        return $extensions;
    }
}