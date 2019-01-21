<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Extension\Standard;

use AccessLogParser\Entity;
use AccessLogParser\Handler;

class ViewsCount implements Handler\Extension {

    /** @var int */
    private $_countViews = 0;

    /**
     * @param Entity\AbstractEntity $entity
     */
    final public function process(Entity\AbstractEntity $entity) {
        $this->_countViews++;
    }

    /**
     * @return int
     */
    final public function result() {
        return $this->_countViews;
    }
}