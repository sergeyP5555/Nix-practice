<?php

namespace App\lib\Messenger;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Email;

class Messenger implements MailerInterface
{
    protected TransportInterface $transport;
    protected $dsn;
    protected $subject;
    protected $text;

    public function setConfig(): void
    {
        $config = require_once 'application/config/mail.php';
        $this->dsn = $config['dsn'];
        $this->subject = $config['subject'];
    }

    public function createMessage(string $name, string $activationCode): void
    {
        $main = require_once "application/config/mailText.php";
        $this->text = "<h3> Welcome to La Fiesta," .  $name . "!</h3><br><p>" . $main .  $activationCode . "</p> ";
    }

    public function sendMessage($activationCode): void
    {
        $this->setConfig();
        $this->createMessage($_POST['login'], $activationCode);
        $transport = Transport::fromDsn($this->dsn);
        $mailer = new Mailer($transport);
        $email = $_POST['email'];
        $mail = (new Email())
            ->from('supportLaFiesta@gmail.com')
            ->to($email)
            ->subject($this->subject)
            ->html($this->text);

        $mailer->send($mail);
    }
}

//if ($_GET['activation_code']){
//    $hash = $_GET['activation_code'];
//    if($_POST['activation_code'] == $hash) {
//        $this->db->query('UPDATE users SET activation = 1 , activation_code = "" WHERE activation_code = :activation_code');
//    }
//}