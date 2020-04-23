<?php

namespace EasyDingTalk;

class AccessToken extends Definition
{
    /**
     * Get token from cache.
     *
     * @return array
     */
    public function get()
    {
        return $this->cache->remember(md5(json_encode($this->credentials())), 7000, function () {
            return $this->refresh();
        });
    }

    /**
     * Get a refresh token.
     *
     * @return array
     */
    public function refresh()
    {
        return $this->client->request('GET', 'gettoken', [
            'query' => $this->credentials(),
        ])->toArray();
    }

    /**
     * The credentials of api request.
     *
     * @return array
     */
    protected function credentials()
    {
        return [
            'appkey' => $this->config['app_key'],
            'appsecret' =>  $this->config['app_secret'],
        ];
    }
}
