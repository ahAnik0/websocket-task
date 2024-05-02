<?php

namespace App\Console\Commands;

use App\Models\RandomNumber;
use Illuminate\Console\Command;

class RandomData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:random-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = [
            'colA' => rand(1, 1000),
            'colB' => rand(1, 1000),
            'colC' => rand(1, 1000)
        ];
        RandomNumber::create($data);
    
        // Trigger event to websocket
        event(new \App\Events\DataGenerated($data));
    }
}
