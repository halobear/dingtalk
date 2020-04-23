<?php

namespace EasyDingTalk;

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
        'user' => User::class,
        'department' => Department::class,
        'role' => Role::class,
        'contact' => Contact::class,
        'access_token' => AccessToken::class,
        'message' => Messages\MessageBuilder::class,
        'corp_message' => Messages\CorpMessageBuilder::class,
    ];

    protected function boot()
    {
        $this->accessTokenMiddleware();

        $this->education = function () {
            return new Education\Application($this->config->all());
        };
    }
}
