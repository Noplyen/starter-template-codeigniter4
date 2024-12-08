<?php

namespace App\ThirdParty;

use DateTime;
use DateTimeZone;
use Monolog\Formatter\JsonFormatter;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MonologConfig
{
    private Logger $logger;
    public function __construct()
    {
        $this->logger = new Logger("MyLogger");
    }

    /**
     * default output console, if you turn on it.
     * The console will turn off
     * ---
     * Note :
     * this use line format output
     *
     * @param bool $fileOutput
     * @return Logger
     */
    public function config(bool $fileOutput=false): Logger
    {
        if($fileOutput){
            // file
            $rotatingFileHandler = new RotatingFileHandler(WRITEPATH.'/logs/app.log',10);
            $rotatingFileHandler->setFormatter($this->lineFormatOutput());
            $this->logger->pushHandler($rotatingFileHandler);

        }else{
            // console
            $streamHandler  = new StreamHandler("php://stderr");
            $streamHandler->setFormatter($this->lineFormatOutput());
            $this->logger->pushHandler($streamHandler);
        }

        return $this->logger;
    }

    private function lineFormatOutput(): LineFormatter
    {
        $output     = "%level_name% | %datetime% > %message% | %context% %extra%\n";
        $dateTime   = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $currentTime = $dateTime->format('Y-m-d ~ H:i');

        return new LineFormatter($output,$currentTime,true,true);
    }
}