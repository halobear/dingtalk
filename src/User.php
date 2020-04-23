<?php

namespace EasyDingTalk;

class User extends Definition
{
    public function administrators()
    {
        return $this->client->request('GET', 'user/get_admin');
    }
}
