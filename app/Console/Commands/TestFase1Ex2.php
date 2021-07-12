<?php

namespace App\Console\Commands;

use App\Services\Test;
use Illuminate\Console\Command;

class TestFase1Ex2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:fase1:ex2';

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
        $service = new Test();
        $finalValue = $service->calculateFinalValue();
        $this->info('Result: ' . $finalValue);
        $this->info('Done');
    }
}
