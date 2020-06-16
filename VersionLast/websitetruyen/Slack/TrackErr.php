<?php

use myPHPnote\SlackLogger;

require "vendor/autoload.php";
require "SlackLogger.php";

$slacklogger = new SlackLogger("https://hooks.slack.com/services/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");
// $slacklogger ->logError("Hey");
// $phlack = new Phlack("https://hooks.slack.com/services/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");
// $response = $phlack->send("test messag");
try
{
    $slacklogger ->randomFunctionName();
}catch (Error $e)
{
    $slacklogger ->logError($e);
}



?>