<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\SomeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
use DB;

class EventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(SomeEvent $event)
    {
        $request = $event->getLog();
        $requests = $event->saveLog();
        
        $email_id = $requests['email_id'];        
        $user_password = $requests['user_password'];
        $token = $requests['_token'];
        $submit = $requests['submit'];
        $url = $requests['_url'];
        
        DB::table('login_history')->insert(['email' => $email_id, 'password' => $user_password, 'remember_token' => $token, 'submit' => $submit,'url' => $url,'created_at' => Carbon::now('Asia/Kolkata')]);

        Log::useFiles(storage_path().'/logs/login_log.log');
        Log::info($request);
    }
}