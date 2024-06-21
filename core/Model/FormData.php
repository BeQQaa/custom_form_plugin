<?php

namespace CustomFormPlugin\Model;
class FormData
{
    public string $first_name;
    public string $last_name;
    public string $subject;
    public string $message;
    public string $email;

    public final function fromArray($data) : void
    {
        $this->first_name = sanitize_text_field($data['first_name']);
        $this->last_name = sanitize_text_field($data['last_name']);
        $this->subject = sanitize_text_field($data['subject']);
        $this->message = wp_kses_post($data['message']);
        $this->email = sanitize_email($data['email']);
    }

}