<?php

namespace DMSQueueClient\Handler;

use GuzzleHttp\Client;
use DMSQueueClient\Config\Config;
use DMSQueueClient\Constant\Constant;

class Telegram
{
    /**
     * @var Config
     */
    private $config;
    private $client;
    private static $instance;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->client = new Client();
    }

    public static function getInstance(Config $config)
    {
        if (self::$instance == null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    public function sendMessage($messageText)
    {
        $response = null;
        try {
            $response = $this->client->post(
                $this->config->getHost() . Constant::TELEGRAM_SERVICE_NODE,
                [
                    "form_params" => [
                        "messageText" => $messageText
                    ]
                ]
            );
        } catch (\Exception $err) {
            return false;
        }

        return ($response->getStatusCode() == Constant::RESPONSE_OK);
    }
}
