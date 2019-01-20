<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Entity;

abstract class AbstractEntity {

    /**
     * @param array $data
     */
    public function __construct(array $data = []) {
        $names = array_keys(get_object_vars($this));
        foreach ($names as $name) {
            if (!array_key_exists($name, $data)) {
                continue;
            }
            $this->$name = $data[$name];
        }
    }
}