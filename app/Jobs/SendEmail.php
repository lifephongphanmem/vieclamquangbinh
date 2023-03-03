<?php

namespace App\Jobs;

use App\Mail\MailDangKy;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $content;
    protected $model_user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($content,$model_user)
    {
        $this->content=$content;
        $this->model_user=$model_user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email= new MailDangKy($this->content,$this->model_user);
        if(isset($this->model_user)){
            Mail::to($this->model_user->email)->send($email);
        }
    }
}
