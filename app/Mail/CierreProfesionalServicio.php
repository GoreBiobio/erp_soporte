<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CierreProfesionalServicio extends Mailable
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
            'fecCreaSolServ' => $this->mailData['fecCreaSolServ'],
            'name' =>$this->mailData['name'],
            'email' => $this->mailData['email'],
            'obsCierreSolServ' => $this->mailData['obsCierreSolServ'],
            'nombreEstado' => $this->mailData['nombreEstado'],
            'servicio' => $this->mailData['servicio']
        );

        return $this->view('mails.cerrarprofesionalserv')
            ->with([
                'data' => $mailData
            ]);
    }
}
