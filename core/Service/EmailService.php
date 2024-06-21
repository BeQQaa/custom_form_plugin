<?php

namespace CustomFormPlugin\Service;

use CustomFormPlugin\Utils\ModalHandler;

class EmailService
{


    private ModalHandler $modalHandler;

    public function __construct()
    {
        $this->modalHandler = new ModalHandler();

    }

    public final function send($to, $subject, $message)
    {
        $sent = wp_mail($to, $subject, $message);

        if ($sent) {
            $this->modalHandler->showModalMessage('Message sent successfully');
            return true;
        } else {
            $this->modalHandler->showModalMessage('Error occurred on send message');
            return false;
        }
    }
}