<?php

namespace M2\Logger;

use M2\Logger\LogUtil;

/**
 * Database based logging. Database credentials need to be entered on object creation
 */
class DbLogging
{
    use LogUtil;

    public function __construct(array $dbConfig)
    {

    }

    public function writeLog(string $type, string $message): bool
    {
        $result = [
            'error' => '',
            'result' => ''
        ];

        if($type == "" || $message == "")
        {
            return false;
        }

        $currentDate = $this->getCurrentDate();
        $logType = $this->getLogTypeString($type);
        $logString = "$currentDate - $logType - $message";

        return true;
    }
}