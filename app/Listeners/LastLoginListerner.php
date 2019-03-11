<?php

namespace App\Listeners;

use App\Events\Logined;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LastLoginListerner
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
     * @param  Logined  $event
     * @return void
     */
    public function handle(Logined $event)
    {
        $user->Auth::user();
        $user->last_login_at = Carbon::now();
        $user->save();

        $log = ['orderId' => 10,
        'description' => 'Some description'];

        $orderLog = new Logger(order);
        $orderLog->pushHandler(new StreamHandler(storage_path('logs/laravel.log')), Logger::INFO);
        $orderLog->info('OrderLog', $log);
    }
}
