<?php

namespace DMSQueueClient\Handler;

use GuzzleHttp\Client;
use DMSQueueClient\Config\Config;
use DMSQueueClient\Entity\EmailArgs;
use DMSQueueClient\Constant\Constant;

class Email
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

    public function sendEmail(EmailArgs $args)
    {
        $response = null;
        try {
            $response = $this->client->post(
                $this->config->getServerHost() . Constant::EMAIL_SERVICE_NODE,
                [
                    "form_params" => [
                        "to"           => $args->getMailTarget(),
                        "mailTemplate" => $args->getMailTemplate(),
                        "payload"      => $args->getPayload()->toArray(),
                    ]
                ]
            );
        } catch (\Exception $err) {
            return false;
        }

        return ($response->getStatusCode() == Constant::RESPONSE_OK);
    }
}
