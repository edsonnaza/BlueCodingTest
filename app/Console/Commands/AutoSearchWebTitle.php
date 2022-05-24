<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use App\Models\Shortlink;
use App\Jobs\UpdateUrlJob;

class AutoSearchWebTitle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:searchwebtitle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        // Dispatch the Job before load the view
        dispatch(new UpdateUrlJob());    
        return 0;
    }
}
