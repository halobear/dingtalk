<?php

namespace EasyDingTalk;

use HttpClient\Cache\Repository as Cache;
use HttpClient\Client;
use HttpClient\Config\Repository as Config;

class Definition
{
    /**
     * The client instance.
     *
     * @var \HttpClient\Client
     */
    protected $client;

    /**
     * The cache instance.
     *
     * @var \HttpClient\Cache\Repository
     */
    protected $cache;

    /**
     * The config instance.
     *
     * @var \HttpClient\Config\Repository
     */
    protected $config;

    /**
     * Create a new Definition instance.
     *
     * @param \HttpClient\Config\Repository $config
     * @param \HttpClient\Cache\Repository  $cache
     * @param \HttpClient\Client $client
     *
     * @return  void
     */
    public function __construct(Config $config, Cache $cache, Client $client)
    {
        $this->config = $config;
        $this->cache = $cache;
        $this->client = $client->setBaseUri('https://oapi.dingtalk.com');
    }
}
