<?php

namespace CustomFormPlugin\Service;

class HubSpotService
{
    private $api_key;
    private $url;

    public function __construct() {
        $this->api_key = defined('HUBSPOT_API_KEY') ? HUBSPOT_API_KEY : null;
        $this->url = defined('HUBSPOT_URL') ? HUBSPOT_URL : null;
    }

    public function createContact($email) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
            "properties": {
                "email":"' . $email . '"
            }
          }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->api_key
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}