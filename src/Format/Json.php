<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Format;

class Json extends AbstractFormat {

    /**
     * @var array $data
     * @return string
     */
    public function convert(array $data) {
        return json_encode($data);
    }
}