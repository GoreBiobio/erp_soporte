<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AsignacionProfesional extends Mailable
{
    use Queueable, SerializesModels;
    protected $mailData;

    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function build()
    {
        $mailData = array(
            'fecCreaSop' => $this->mailData['fecCreaSop'],
            'name' =>$this->mailData['name'],
            'email' => $this->mailData['email'],
            'solicitudSop' => $this->mailData['solicitudSop'],
            'nombreEstado' => $this->mailData['nombreEstado']
        );

        return $this->view('mails.asignarprofesional')
            ->with([
                'data' => $mailData
            ]);
    }
}
