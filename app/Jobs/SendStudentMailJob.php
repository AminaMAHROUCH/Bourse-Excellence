<?php

namespace App\Jobs;

use App\Mail\EmailForQueuing;
use App\Models\Actualite;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendStudentMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $template_data;
    public $mail_id;

    public function __construct($template_data, $mail_id)
    {
       $this->template_data = $template_data;
       $this->mail_id = $mail_id;
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
     
  
    private $data ; 
    public function handle()
    {
        $data = Student::whereIn('id', $this->mail_id)->get(); 
        //dd($data);
        foreach($data as $d ) {  
            Mail::to($d->email)->queue(new StudentMailId($this->template_data));  }
            ////////////////////////////    
    }
}