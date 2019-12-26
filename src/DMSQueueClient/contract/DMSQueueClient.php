<?php

namespace DMSQueueClient\contract;

interface DMSQueueClient
{
    public function sendEmail();
    public function sendTelegramMessage();
}
