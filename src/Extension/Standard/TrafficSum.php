<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Extension\Standard;

use AccessLogParser\Entity;
use AccessLogParser\Extension;

class TrafficSum extends Extension\AbstractExtension {

    /** @var int */
    private $_traffic = 0;

    /**
     * @param Entity\AbstractEntity $entity
     */
    public function process(Entity\AbstractEntity $entity) {
        /** @var Entity\Standard\AccessLog $entity */
        $this->_traffic += (int) $entity->length;
    }

    /**
     * @return int
     */
    public function result() {
        return $this->_traffic;
    }
}