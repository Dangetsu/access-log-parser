<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Extension;

use AccessLogParser\Entity;

abstract class AbstractExtension {

    /**
     * @param Entity\AbstractEntity $entity
     */
    abstract public function process(Entity\AbstractEntity $entity);

    /**
     * @return mixed
     */
    abstract public function result();

}