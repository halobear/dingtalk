<?php

namespace EasyDingTalk\Tests;

class UserTest extends TestCase
{
    public function testAdministrators()
    {
        $this->app->user->administrators();

        $this->recorder->assertSentCount(1)->assertSent(function ($request) {
            return $request->getMethod() === 'GET'
                && $request->getUri()->__toString() === 'https://oapi.dingtalk.com/user/get_admin?access_token=test-token';
        });
    }
}
