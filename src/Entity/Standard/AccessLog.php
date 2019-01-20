<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Entity\Standard;

use AccessLogParser\Entity;

class AccessLog extends Entity\AbstractEntity {

    /** @var string */
    public $ip;

    /** @var string */
    public $remote_log_name;

    /** @var int */
    public $userid;

    /** @var string */
    public $date;

    /** @var string */
    public $timezone;

    /** @var string */
    public $request_method;

    /** @var string */
    public $path;

    /** @var float */
    public $request_version;

    /** @var int */
    public $status;

    /** @var int */
    public $length;

    /** @var string */
    public $referrer;

    /** @var string */
    public $user_agent;

}