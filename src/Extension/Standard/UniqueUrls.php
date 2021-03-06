<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Extension\Standard;

use AccessLogParser\Entity;
use AccessLogParser\Handler;

class UniqueUrls implements Handler\Extension {

    /** @var array */
    private $_urls = [];

    /**
     * @param Entity\AbstractEntity $entity
     */
    final public function process(Entity\AbstractEntity $entity) {
        /** @var Entity\Standard\AccessLog $entity */
        if (!array_key_exists($entity->path, $this->_urls)) {
            $this->_urls[$entity->path] = null; // Поиск через ключ - быстрее
        }
    }

    /**
     * @return int
     */
    final public function result() {
        return count($this->_urls);
    }
}