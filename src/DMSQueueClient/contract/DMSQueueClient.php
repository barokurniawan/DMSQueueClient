<?php

namespace DMSQueueClient\contract;

use DMSQueueClient\Entity\EmailArgs;

interface DMSQueueClient
{
    public function sendEmail(EmailArgs $args);
    public function sendTelegramMessage($messageText);
}
