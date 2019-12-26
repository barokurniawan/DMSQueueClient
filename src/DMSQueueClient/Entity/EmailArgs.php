<?php

namespace DMSQueueClient\Entity;

class EmailArgs
{
    /**
     * @var array
     */
    private $to;

    /**
     * @var string
     */
    private $mailTemplate;

    /**
     * @var MailPayload
     */
    private $payload;

    public function __construct()
    {
        $this->to = [];
    }

    function addMailTarget($emailAddress)
    {
        array_push($this->to, $emailAddress);
        return $this;
    }

    /**
     * Get the value of to
     *
     * @return  array
     */
    public function getMailTarget()
    {
        return $this->to;
    }

    /**
     * Get the value of mailTemplate
     *
     * @return  string
     */
    public function getMailTemplate()
    {
        return $this->mailTemplate;
    }

    /**
     * Set the value of mailTemplate
     *
     * @param  string  $mailTemplate
     *
     * @return  self
     */
    public function setMailTemplate(string $mailTemplate)
    {
        $this->mailTemplate = $mailTemplate;

        return $this;
    }

    /**
     * Get the value of payload
     *
     * @return  MailPayload
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Set the value of payload
     *
     * @param  MailPayload  $payload
     *
     * @return  self
     */
    public function setPayload(MailPayload $payload)
    {
        $this->payload = $payload;

        return $this;
    }
}
