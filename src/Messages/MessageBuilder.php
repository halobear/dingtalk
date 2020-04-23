<?php

namespace EasyDingTalk\Messages;

use EasyDingTalk\Definition;
use HttpClient\Client;

class MessageBuilder extends Definition
{
    use HasAttributes;

    public function from($sender)
    {
        return $this->with('sender', $sender);
    }

    public function to($to)
    {
        return $this->with('cid', $to);
    }

    public function send($message)
    {
        if ($message instanceof Message) {
            $message = Message::buildFrom($message);
        }

        return $this->client->request('POST', 'message/send_to_conversation', ['json' => $this->attributes() + [
            'msg' => $message
        ]]);
    }
}
