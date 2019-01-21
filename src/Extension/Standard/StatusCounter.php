<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Extension\Standard;

use AccessLogParser\Entity;
use AccessLogParser\Handler;

class StatusCounter implements Handler\Extension {

    /** @var array */
    private $_statuses = [];

    /**
     * @param Entity\AbstractEntity $entity
     */
    final public function process(Entity\AbstractEntity $entity) {
        /** @var Entity\Standard\AccessLog $entity */
        $this->_incStatusCount($entity->status);
    }

    /**
     * @return array
     */
    final public function result() {
        return $this->_statuses;
    }

    /**
     * @param string $status
     */
    private function _incStatusCount($status) {
        if (!array_key_exists($status, $this->_statuses)) {
            $this->_statuses[$status] = 0;
        }
        $this->_statuses[$status] += 1;
    }
}