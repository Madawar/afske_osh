<?php

namespace App\Mail;

use App\Models\Incident;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendClosureReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $incident;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Incident $incident, User $user)
    {
        $this->incident = $incident;
        $this->user = $user;
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
        $subject = 'Reminder to close out incident: ' . $incident->incident_no;
        return $this->from('osh@afske.aero')->bcc('osh@afske.aero')->subject($subject)->view('emails.reminder')->with(compact('incident', 'user'));
    }
}
