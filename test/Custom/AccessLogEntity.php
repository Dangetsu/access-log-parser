<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test\Custom;

use AccessLogParser\Entity;

class AccessLogEntity extends Entity\Standard\AccessLog {

    /** @var string */
    public $host;

}