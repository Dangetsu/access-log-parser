<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Handler;

use AccessLogParser\Entity;

interface Extension {

    /**
     * @param Entity\AbstractEntity $entity
     */
    public function process(Entity\AbstractEntity $entity);

    /**
     * @return mixed
     */
    public function result();

}