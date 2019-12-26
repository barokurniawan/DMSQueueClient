<?php

namespace DMSQueueClient\Config;

class Config
{
    private $serverHost;
    private $serviceEnable;

    public function __construct($serverHost = null, $enableService = true)
    {
        $this->serviceEnable = $enableService;
        $this->setServerHost($serverHost);
    }

    public function isServiceEnable()
    {
        return $this->serviceEnable;
    }

    public function getServerHost()
    {
        return $this->serverHost;
    }

    public function setServerHost($serverHost)
    {
        $this->serverHost = $serverHost;
        return $this;
    }
}
