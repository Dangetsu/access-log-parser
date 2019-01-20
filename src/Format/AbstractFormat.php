<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Format;

abstract class AbstractFormat {

    /**
     * @var array $data
     * @return mixed
     */
    abstract public function convert(array $data);

}