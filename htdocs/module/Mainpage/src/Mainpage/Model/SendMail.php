<?php

namespace Mainpage\Model;

use Zend\Mail\Message;

class SendMail
{
    public function __construct($emailfields)
    {
        $this->getEmail($emailfields);
    }

    public function getEmail($emailfields)
    {
        $message = new Message();
        $message->addFrom("Sever")
            ->addTo("demonege@web.de")
            ->setSubject("Eine Neue kontakt anfrage");
        $message->setBody($this->getEmailBody($emailfields));

        return $message;
    }

    public function getEmailBody($emailfields)
    {
        $emailBody = 'Eine kontaktanfrage mit folgenden Daten';
        foreach($emailfields as $key => $value)
        {
            if($key == 'abschicken')
                break;
            $emailBody .= '<br>';
            $emailBody .= $key . ':' . $value;
        }

        return $emailBody;
    }
}