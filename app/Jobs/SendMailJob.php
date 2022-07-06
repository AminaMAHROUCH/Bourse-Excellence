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

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $template_data;
  
    public function __construct($template_data)
    {    
        $this->template_data = $template_data ; 
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    private $data ; 
    public function handle()
    {
        $data = Student::all();  
        foreach($data as $d ) {  
            Mail::to($d->email)->queue(new EmailForQueuing($this->template_data));  }
            ////////////////////////////
         
    }
}