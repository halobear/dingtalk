<?php

namespace EasyDingTalk\Messages;
class CorpMessageBuilder
{
    use HasAttributes;

    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function fromAgentId($agentId)
    {
        return $this->with('agent_id', $agentId);
    }

    public function toUsers($users)
    {
        if (is_array($users)) {
            $users = implode(',', $users);
        }

        return $this->with('userid_list', $users);
    }

    public function toDepartments($departments)
    {
        if (is_array($departments)) {
            $departments = implode(',', $departments);
        }

        return $this->with('dept_id_list', $departments);
    }

    public function toAllUsers()
    {
        return $this->with('to_all_user', 'true');
    }

    public function send($message)
    {
        if ($message instanceof Message) {
            $message = Message::buildFrom($message);
        }

        return $this->client->makeRequest('POST', 'topapi/message/corpconversation/asyncsend_v2', ['json' => $this->attributes + [
            'msg' => $message
        ]]);
    }
}
