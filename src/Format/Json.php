<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Format;

use AccessLogParser\Handler;

class Json implements Handler\Format {

    /**
     * @var array $data
     * @return string
     */
    public function convert(array $data) {
        return json_encode($data);
    }
}