<?php

namespace EasyDingTalk\Tests;

use EasyDingTalk\Messages\MessageBuilder;
use EasyDingTalk\Tests\TestCase;

class MessageBuilderTest extends TestCase
{
    public function testAttributes()
    {
        $this->app->message->from('mingyoung')->to('cc');

        $this->assertSame(['sender' => 'mingyoung', 'cid' => 'cc'], $this->app->message->attributes());
    }

    public function testSend()
    {
        $this->app->message->from('mingyoung')->to('cc')->send(['foo' => 'bar']);

        $this->recorder->assertSentCount(1)->assertSent(function ($request) {
            $this->assertSame('{"sender":"mingyoung","cid":"cc","msg":{"foo":"bar"}}', $request->getBody()->getContents());

            return $request->getMethod() === 'POST'
                && $request->getUri()->__toString() === 'https://oapi.dingtalk.com/message/send_to_conversation?access_token=test-token';
        });
    }
}
