<?php

namespace M2\Logger;

trait LogUtil
{
    public function getLogTypeString($type)
    {
        return match($type) {
            'event'   => '[EVENT]',
            'warning' => '[WARNING]',
            'error'   => '[ERROR]'
        };
    }

    public function getCurrentDate()
    {
        return date('Y-m-d H:i:s');
    }

    public function constructMessageString(string $typeString, string $date, string $message)
    {
        return "$typeString - $date - $message \n";
    }
}