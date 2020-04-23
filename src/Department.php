<?php

namespace EasyDingTalk;

class Department extends Definition
{
    public function list($id = null, $fetchChild = null, $lang = null)
    {
        return $this->client->request('GET', 'department/list', [
            'query' => [
                'id' => $id,
                'fetch_child' => $fetchChild ? 'true' : 'false',
                'lang' => $lang,
            ],
        ]);
    }
}
