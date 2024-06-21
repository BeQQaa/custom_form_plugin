<?php

namespace CustomFormPlugin\Controller;

use CustomFormPlugin\Logger\Log;
use CustomFormPlugin\Service\EmailService;
use CustomFormPlugin\Service\FormService;
use CustomFormPlugin\Service\HubSpotService;

class FormController
{
    private EmailService $emailService;
    private FormService $formService;
    private HubSpotService $hubSpotService;
    private Log $logger;

    public function __construct()
    {
        $this->formService = new FormService();
        $this->emailService = new EmailService();
        $this->hubSpotService = new HubSpotService();
        $this->logger = new Log();
    }


    public function handleFormSubmission()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_form'])) {

            $formData = $this->formService->processFormSubmission($_POST);
            $status = $this->emailService->send($formData->email, $formData->subject, $formData->message);
            if ($status){
                $this->logger->store('email sent:' . $formData->email);
            }
            $this->hubSpotService->createContact($formData->email);

        }


    }

}