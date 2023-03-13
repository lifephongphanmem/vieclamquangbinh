<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailDangKy extends Mailable
{
    use Queueable, SerializesModels;
protected $content;
protected $model_user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$model_user)
    {
        $this->content=$content;
        $this->model_user=$model_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email=$this->subject('Thông báo')->view('mail.maildangky');
        return $email
                    ->with('content',$this->content)
                    ->with('model_user',$this->model_user);
    }
}
