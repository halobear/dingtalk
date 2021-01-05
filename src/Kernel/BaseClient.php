<?php

/*
 * This file is part of the mingyoung/dingtalk.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyDingTalk\Kernel;

class BaseClient
{
    /**
     * @var \EasyDingTalk\Application
     */
    protected $app;

    protected $client;

    /**
     * @var \EasyDingTalk\Kernel\Http\Client
     */
    protected $request;

    /**
     * Client constructor.
     *
     * @param \EasyDingTalk\Application $app
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->request = $this->app['client']->withAccessTokenMiddleware()->withRetryMiddleware();

        $this->client = $this;
    }

    /**
     * @param  string  $uri
     * @param  array  $options
     * @param  false  $async
     * @return array|\GuzzleHttp\Promise\PromiseInterface|object|\Overtrue\Http\Support\Collection|\Psr\Http\Message\ResponseInterface|string
     */
    public function get(string $uri, array $options = [], $async = false)
    {
        return $this->request->get( $uri,  ['query'=>$options], $async);
    }

    /**
     * @param  string  $uri
     * @param  array  $data
     * @return array|\GuzzleHttp\Promise\PromiseInterface|object|\Overtrue\Http\Support\Collection|\Psr\Http\Message\ResponseInterface|string
     */
    public function postJson(string $uri, array $data = [])
    {
        return $this->request->post($uri, [], ['json'=>$data]);
    }

    /**
     * @param string $uri
     * @param array  $data
     * @param array  $options
     * @param bool   $async
     *
     * @return \Psr\Http\Message\ResponseInterface|\Overtrue\Http\Support\Collection|array|object|string
     */
    public function post(string $uri, array $data = [], array $options = [])
    {
        // dd($data);
        return $this->request->post($uri, $data);
    }
}
