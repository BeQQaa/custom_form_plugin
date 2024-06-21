<?php

namespace CustomFormPlugin\Logger;

class Log
{
    private string $logPath;

    public function __construct(string $logPath = ABSPATH . 'wp-content/plugins/custom-form-plugin/custom-form-log.log')
    {
        $this->logPath = $logPath;
    }

    public final function store(string $message): void
    {
        $entry = date('Y-m-d H:i:s') . ': ' . $message . "\n";
        file_put_contents($this->logPath, $entry, FILE_APPEND);
    }
}