<?php

namespace CustomFormPlugin\Service;

use CustomFormPlugin\Model\FormData;
use CustomFormPlugin\Utils\ModalHandler;
use CustomFormPlugin\Validation\EmailValidation;
use CustomFormPlugin\Validation\Validation;

class FormService
{
    private FormData $formDataModel;
    private Validation $emailValidation;
    private ModalHandler $errorHandler;


    public function __construct()
    {
        $this->formDataModel = new FormData();
        $this->emailValidation = new EmailValidation();
        $this->errorHandler = new ModalHandler();
    }

    public final function processFormSubmission(array $data): FormData
    {
        $this->formDataModel->fromArray($data);

        if (!$this->emailValidation->isValid($this->formDataModel->email)) {
            $this->errorHandler->showModalMessage('Wrong email address');
        }

        return $this->formDataModel;

    }
}