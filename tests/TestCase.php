<?php

namespace EasyDingTalk\Tests;

use EasyDingTalk\Application;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Psr\SimpleCache\CacheInterface;

class TestCase extends BaseTestCase
{
    public $app;
    public $recorder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app = new Application([
            'app_key' => 'test',
            'app_secret' => 'test',
        ]);

        $this->app->cache->resolveCacheUsing(function () {
            return new class implements CacheInterface {
                public function get($key, $default = null)
                {
                    return ['access_token' => 'test-token'];
                }

                public function set($key, $value, $ttl = null)
                {
                    //
                }

                public function delete($key)
                {
                    //
                }

                public function clear()
                {
                    //
                }

                public function getMultiple($keys, $default = null)
                {
                    //
                }

                public function setMultiple($values, $ttl = null)
                {
                    //
                }

                public function deleteMultiple($keys)
                {
                    //
                }

                public function has($key)
                {
                    //
                }
            };
        });

        $this->recorder = $this->app->client->fake();
    }
}
