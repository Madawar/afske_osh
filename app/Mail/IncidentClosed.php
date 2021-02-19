<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Incident;
use App\Models\User;

class IncidentClosed extends Mailable
{
    use Queueable, SerializesModels;

    public $incident;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Incident $incident,User $user)
    {
        $this->incident = $incident;
        $this->user= $user;
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
        $subject = 'Incident: '.$incident->incident_no;
        return $this->from('osh@afske.aero')->subject($subject)->view('emails.incident_response')->with(compact('incident','user'));
    }
}
