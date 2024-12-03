<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class ApiRequestCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:apirequest {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    // public function handle()
    // {
    //     //
    // }
    protected function getStub(){
        return __DIR__ . '/stub/api-request.stub';

    }

    protected function getDefaultNamespace($rootNamespace){
        return   $rootNamespace . '/http/ApiRequest' ;
    }
}
