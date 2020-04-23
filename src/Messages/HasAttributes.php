<?php

namespace EasyDingTalk\Messages;

trait HasAttributes
{
    protected $attributes = [];

    public function with($key, $value)
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    public function attributes()
    {
        return $this->attributes;
    }
}
