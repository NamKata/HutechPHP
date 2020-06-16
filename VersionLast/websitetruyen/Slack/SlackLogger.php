<?php

namespace myPHPnote;
use Crummy\Phlack\phlack;

class SlackLogger 
{
    protected $client;
    function __construct( string $webhook_url)
    {
        $this->client = new Phlack($webhook_url);

    }
    public function logError($e)
    {
        
        $messageBuilder = $this->client->getMessageBuilder();
        $messageBuilder
                ->setText("Error Type: " . get_class($e))
                ->createAttachment()
                    ->setTitle($e->getMessage() . "\n" . "File: " . $e->getFile() . "\n" . "Line: " . $e->getLine())
                    ->setText($e ->getTraceAsString())
                    ->setColor("#ff0000")
                ->end();
        $message = $messageBuilder->create();
        return $this->client->send($message);
    }


}

?>