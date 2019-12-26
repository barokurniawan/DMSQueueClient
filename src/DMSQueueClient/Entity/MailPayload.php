<?php

namespace DMSQueueClient\Entity;

class MailPayload
{
    private $bodyMessage;
    private $subject;
    private $serviceName;

    /**
     * Get the value of bodyMessage
     */
    public function getBodyMessage()
    {
        return $this->bodyMessage;
    }

    /**
     * Set the value of bodyMessage
     *
     * @return  self
     */
    public function setBodyMessage($bodyMessage)
    {
        $this->bodyMessage = $bodyMessage;

        return $this;
    }

    /**
     * Get the value of subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of serviceName
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * Set the value of serviceName
     *
     * @return  self
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;

        return $this;
    }

    public function toArray()
    {
        return [
            "subject"     => $this->getSubject(),
            "bodyMessage" => $this->getBodyMessage(),
            "serviceName" => $this->getServiceName(),
        ];
    }
}
