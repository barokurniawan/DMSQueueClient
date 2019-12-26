<?php

namespace DMSQueueClient;

use DMSQueueClient\Config\Config;
use DMSQueueClient\Handler\Email;
use DMSQueueClient\Entity\EmailArgs;
use DMSQueueClient\Handler\Telegram;

class DMSQueueClient implements \DMSQueueClient\contract\DMSQueueClient
{
    private $config;
    private static $instance;

    public static function getInstance(Config $config)
    {
        if (empty(self::$instance)) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function sendEmail(EmailArgs $args)
    {
        if (!$this->config->isServiceEnable()) {
            return false;
        }

        if (empty($args->getMailTarget()) || empty($args->getMailTemplate())) {
            return false;
        }

        $email = Email::getInstance($this->config);
        return $email->sendEmail($args);
    }

    public function sendTelegramMessage($messageText = null)
    {
        if (!$this->config->isServiceEnable()) {
            return false;
        }

        if (empty($messageText)) {
            return false;
        }

        $telegram = Telegram::getInstance($this->config);
        return $telegram->sendMessage($messageText);
    }
}
