<?php
use Illuminate\Support\Facades\Mail;

Mail::raw('Test email', function($message) {
    $message->to('test@example.com')
            ->subject('Test Email');
});