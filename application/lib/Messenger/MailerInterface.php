<?php

namespace App\lib\Messenger;

interface MailerInterface
{
    public function sendMessage($activationCode): void;
}