<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Extension\Standard;

use AccessLogParser\Entity;
use AccessLogParser\Handler;

class TrafficSum implements Handler\Extension {

    /** @var int */
    private $_traffic = 0;

    /**
     * @param Entity\AbstractEntity $entity
     */
    final public function process(Entity\AbstractEntity $entity) {
        /** @var Entity\Standard\AccessLog $entity */
        $this->_traffic += (int) $entity->length;
    }

    /**
     * @return int
     */
    final public function result() {
        return $this->_traffic;
    }
}