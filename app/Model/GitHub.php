<?php
namespace Gongongo\Model;

use Github\Client as Client;
use \Github\HttpClient\CachedHttpClient as ClientCache;
use \Gongongo\Helper\Cache;

class GitHub
{
    private $client;

    public function getRepositories($username)
    {
        $key = __NAMESPACE__ . __CLASS__ . __FUNCTION__;
        $cashier = Cache::getInstance();

        $repos = $cashier->get($key);

        if ($repos === false) {
            $repos = $this->getClient()->api('user')->setPerPage(100)->repositories($username);
            $cashier->set($key, $repos, 43200); // 12 hours
        }

        return $repos;
    }

    private function getClient()
    {
        if (is_null($this->client)) {
            $this->client = new Client;
        }

        return $this->client;
    }
}