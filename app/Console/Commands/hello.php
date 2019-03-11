<?php

namespace App\Console\Commands;
use App\Http\Controllers\StudentController as StudentsController;
use Illuminate\Console\Command;

class hello extends Command
{    
    protected $signature = 'hello:name';

    protected $description = 'This is Hello Command';

    protected $read;
    
    public function __construct(StudentsController $read)
    {
        parent::__construct();
        $this->nikhil = $read;
    }

    public function handle()
    {
        return $this->nikhil->test();
    }
}
