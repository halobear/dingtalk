<?php

namespace EasyDingTalk\Messages;

class Message
{
    protected $attributes = [];

    protected $aliases = [
        //
    ];

    public function with($key, $value)
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    public function attributes()
    {
        $result = [];
        foreach ($this->attributes as $key => $value) {
            if (isset($this->aliases[$key])) {
                $result[$this->aliases[$key]] = $value;
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    public function __call($key, $value)
    {
        return $this->with($key, ...$value);
    }

    public static function buildFrom(self $message)
    {
        return [
            'msgtype' => $message->type,
            $message->type => $message->attributes(),
        ];
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func([new static, $method], ...$args);
    }
}
