<?php

namespace EasyDingTalk\Education;

use EasyDingTalk\AccessToken;
use EasyDingTalk\HasAccessTokenMiddleware;
use EasyDingTalk\Listeners\AccessTokenMiddleware;
use HttpClient\Application as BaseApplication;
use HttpClient\Events\ClientResolved;
use HttpClient\Middleware\MergeQuery;

class Application extends BaseApplication
{
    use HasAccessTokenMiddleware;

    /**
     * The definitions in the container.
     *
     * @var array
     */
    protected $definitions = [
        'access_token' => AccessToken::class,
        'campus' => Campus::class,
        'period' => Period::class,
    ];

    protected function boot()
    {
        $this->accessTokenMiddleware();
    }
}
