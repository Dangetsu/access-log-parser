<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace AccessLogParser\Extension\Standard;

use AccessLogParser\Entity;
use AccessLogParser\Handler;

class CrawlersCounter implements Handler\Extension {

    /** @var array */
    private $_crawlers = [];

    /**
     * @param Entity\AbstractEntity $entity
     */
    public function process(Entity\AbstractEntity $entity) {
        /** @var Entity\Standard\AccessLog $entity */
        $crawlers = $this->_getCrawlers();
        foreach ($crawlers as $crawler => $agent) {
            if (strpos($entity->user_agent, $agent) !== false) {
                $this->_incCrawlerCount($crawler);
            }
        }
    }

    /**
     * @return array
     */
    public function result() {
        return $this->_crawlers;
    }

    /**
     * @return array
     */
    protected function _getCrawlers() {
        return [
            'google' => 'Googlebot',
            'yandex' => 'YandexBot',
            'bing' => 'bingbot',
            'baidu' => 'Baiduspider',
        ];
    }

    /**
     * @param string $crawler
     */
    private function _incCrawlerCount($crawler) {
        if (!array_key_exists($crawler, $this->_crawlers)) {
            $this->_crawlers[$crawler] = 0;
        }
        $this->_crawlers[$crawler] += 1;
    }
}