<?php

namespace EasyDingTalk;

use HttpClient\Middleware\MergeQuery;

trait HasAccessTokenMiddleware
{
    protected function accessTokenMiddleware()
    {
        $this->client->middleware->add('access_token', (new MergeQuery(function () {
            return ['access_token' => $this->app->access_token->get()['access_token']];
        }))->ignoreWhen(function ($request) {
            return $request->getUri()->getPath() === '/gettoken';
        }));
    }
}
