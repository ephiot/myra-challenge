<?php

namespace App\Console\Commands;

use App\Helpers\TestFase1;
use Illuminate\Console\Command;

class TestFase1Ex1B extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:fase1:ex1:b {number : Integer to be calculated}';

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
        $number = (int) $this->argument('number');
        $this->info('Factorial: ' . TestFase1::getFactorial($number), $debug);
        $this->info('Done');
    }
}
