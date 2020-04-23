<?php

namespace EasyDingTalk\Education;

use EasyDingTalk\Client;

class Campus extends Client
{
    public function list()
    {
        return $this->makeRequest('GET', 'topapi/edu/campus/list');
    }
}
