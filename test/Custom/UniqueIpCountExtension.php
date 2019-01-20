<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test\Custom;

use AccessLogParser\Entity;
use AccessLogParser\Handler;

class UniqueIpCountExtension implements Handler\Extension {

    /** @var array */
    private $_ips = [];

    /**
     * @param Entity\AbstractEntity $entity
     */
    public function process(Entity\AbstractEntity $entity) {
        /** @var AccessLogEntity $entity */
        if (!array_key_exists($entity->ip, $this->_ips)) {
            $this->_ips[$entity->ip] = null; // Поиск через ключ - быстрее
        }
    }

    /**
     * @return int
     */
    public function result() {
        return count($this->_ips);
    }
}