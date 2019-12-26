<?php

namespace DMSQueueClient;

use DMSQueueClient\Config\Config;
use DMSQueueClient\Handler\Telegram;

class DMSQueueClient implements \DMSQueueClient\contract\DMSQueueClient
{
    private $config;
    function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function sendEmail()
    {
    }

    public function sendTelegramMessage($messageText = null)
    {
        if (empty($messageText)) {
            return false;
        }

        $telegram = Telegram::getInstance($this->config);
        return $telegram->sendMessage($messageText);
    }
}
