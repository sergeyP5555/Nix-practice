<?php

namespace App\lib\Logger;

interface LoggerInterface
{
    public function log($level, $message, array $context = []);
}
