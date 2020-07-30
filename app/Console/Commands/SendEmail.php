<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Mail;
use App\Mail\SendMail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending emails to users that havent returned their books';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = date('Y-m-d');
       $users = User::all();
       foreach($users as $user)
       {
           $librat = $user->libris()->where([
                ['afati', '>=',$date],
                ['kthyer', '=', false],
            ])->get();
            foreach($librat as $libri)
            {
                $data = array();
                $data['titulli']= $libri->titulli;
                $data['isbn']= $libri->ISBN;
                $data['perdoruesi']= $user->name;
                Mail::to($user->email)->send(new SendMail($data));
            }

       }
    }
}
