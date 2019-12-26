# DMSQueueClient
DMSQueueClient is a client implementation of DMSQueueService.

### Send Telegram Message 
```
$client = DMSQueueClient::getInstance(new Config("http://dms-queue-server-address"));
$client->sendTelegramMessage("sending from DMSQueueClient");
```

### Send Email 
```
$client = DMSQueueClient::getInstance(new Config("http://dms-queue-server-address"));
$payload = new MailPayload;
$payload->setServiceName("Forway Mail Service");
$payload->setSubject("Test message");
$payload->setBodyMessage("test message ajah");

$args = new EmailArgs;
$args->addMailTarget("your-target-mail@mailmailan.com");
$args->setMailTemplate("mailer.test-mail");
$args->setPayload($payload);

$client->sendEmail($args);
```
