<?php

namespace App\Console\Commands;

use App\Helpers\TestFase1;
use Illuminate\Console\Command;

class TestFase1Ex1A extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:fase1:ex1:a {numbers : Integers comma separated list}';

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
        $numbers = explode(',', $this->argument('numbers'));
        $this->info('Multiples of 5: ' . TestFase1::getMultiples(...$numbers));
        $this->info('Done');
    }
}
