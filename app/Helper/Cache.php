<?php
namespace Gongongo\Helper;

use \Memcached;

class Cache
{
    private static $instance = null;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            $cache = new Memcached;
            $cache->setOption(Memcached::OPT_BINARY_PROTOCOL, true);
            $cache->setSaslAuthData(
                getenv('MEMCACHIER_USERNAME'),
                getenv('MEMCACHIER_PASSWORD')
            );

            $servers = array();
            foreach (explode(",", getenv("MEMCACHIER_SERVERS")) as $server) {
                $servers[] = explode(":", $server);
            }
            if (!$cache->getServerList()) {
                $cache->addServers($servers);
            }

            self::$instance = $cache;
        }

        return self::$instance;
    }

    private function __construct() {}
}