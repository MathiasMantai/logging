<?php

namespace M2\Logger;

use M2\Logger\LogUtil;
use Exception;

/**
 * File based logging. create and write to access, event and error logs
 */
class FileLogger
{

    use LogUtil;

    public function __construct(public string $logPath){}

    public function writeLog(string $type, string $message): void
    {
        $path = $this->logPath . "/" . $type . "_log.log";
        $date = $this->getCurrentDate();
        $typeString = $this->getLogTypeString($type);
        $messageString = $this->constructMessageString($typeString, $date, $message);

        $open = fopen($path, "a");

        if(!$open)
        {
            throw new Exception("");
        }

        $write = fwrite($open, $messageString);

        if(!$write)
        {
            throw new Exception("");
        }

        fclose($open);
    }
}