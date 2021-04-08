<?php

namespace App\Mail;

use App\Models\Incident;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewIncident extends Mailable
{

    public $incident;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Incident $incident)
    {
        $this->incident = $incident;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $incident = $this->incident;
        $user = $this->user;
        $subject = 'Thanks for reporting: ' . $incident->incident_no;
        return $this->from('osh@afske.aero')->bcc('osh@afske.aero')->subject($subject)->view('emails.new_incident')->with(compact('incident', 'user'));
    }
}
