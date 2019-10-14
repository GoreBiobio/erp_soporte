<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CierreProfesional extends Mailable
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
            'obsCierreSop' => $this->mailData['obsCierreSop'],
            'nombreEstado' => $this->mailData['nombreEstado'],
            'fecCierreSop' => $this->mailData['fecCierreSop']
        );

        return $this->view('mails.cerrarprofesional')
            ->with([
                'data' => $mailData
            ]);
    }
}
