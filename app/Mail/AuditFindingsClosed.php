<?php

namespace App\Mail;

use App\Models\Audit;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuditFindingsClosed extends Mailable
{
    use Queueable, SerializesModels;

    public $audit;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Audit $audit,User $user)
    {
        $this->user = $user;
        $this->audit = $audit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $audit = $this->audit;
        $user = $this->user;
        $subject = 'Audit Closed: '.$audit->audit_no;
        return $this->from('osh@afske.aero')->subject($subject)->view('emails.audit_closed')->with(compact('audit','user'));
    }
}
