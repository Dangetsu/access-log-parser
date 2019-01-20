<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Extension\Standard;

use AccessLogParser\Entity;
use AccessLogParser\Extension;

class ViewsCount extends Extension\AbstractExtension {

    /** @var int */
    private $_countViews = 0;

    /**
     * @param Entity\AbstractEntity $entity
     */
    public function process(Entity\AbstractEntity $entity) {
        $this->_countViews++;
    }

    /**
     * @return int
     */
    public function result() {
        return $this->_countViews;
    }
}