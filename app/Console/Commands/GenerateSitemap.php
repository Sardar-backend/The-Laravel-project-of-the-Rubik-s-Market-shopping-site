<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SitemapController;
// use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Schedule ;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemapController = new sitemapController();
        $sitemapController->index();
        $this->info('Sitemap has been updated!');
    }

    protected function schedule(Schedule $schedule)
    {
    $schedule->command('sitemap:update')->daily(); // اجرای روزانه، می‌توانید زمان دلخواه را تنظیم کنید
    }
}
