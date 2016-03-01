<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class logDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logo:demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will add one line to log file';

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
     * @return mixed
     */
    public function handle()
    {
        \Log::info('I was here at '.  \Carbon\Carbon::now());
    }
}
