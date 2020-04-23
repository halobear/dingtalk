<?php

namespace EasyDingTalk\Education;

use EasyDingTalk\Client;

class Period extends Client
{
    public function list($campusId)
    {
        return $this->makeRequest('POST', 'topapi/edu/period/list', [
            'json' => ['campus_id' => $campusId],
        ]);
    }
}
