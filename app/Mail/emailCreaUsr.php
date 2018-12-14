<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class emailCreaUsr extends Mailable
{
    use Queueable, SerializesModels;

    public $creaUsrMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($creaUsrMail)
    {
        $this->creaUsrMail=$creaUsrMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('haze_case@arciait.com')
            ->view('mails.creaUsario')
            ->text('mails.creaUsuario_plano')
            ->with(
                [
                    'testVarOne' => '1',
                    'testVarTwo' => '2',
                ])/*
            ->attach(public_path('/images').'/demo.jpg', [
                'as' => 'demo.jpg',
                'mime' => 'image/jpeg',
            ])*/;
    }
}
