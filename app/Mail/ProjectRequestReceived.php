<?php

namespace App\Mail;

use App\Models\ProjectRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $projectRequest;

    public function __construct(ProjectRequest $projectRequest)
    {
        $this->projectRequest = $projectRequest;
    }

    public function build()
    {
        return $this->subject('New Project Request Received')
            ->view('emails.project_request_received');
    }
}
