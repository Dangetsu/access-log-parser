<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Handler;

interface Format {

    /**
     * @param array $data
     * @return mixed
     */
    public function convert(array $data);

}