<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PracticalLessonRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Demande de cours pratique - ' . $this->data['user_name'])
                    ->view('emails.practical-lesson-request')
                    ->with('data', $this->data);
    }
}