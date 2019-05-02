<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\SitemapArticle',
        'App\Console\Commands\SitemapSection'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sitemap:article')->everyMinute();
        $schedule->command('sitemap:section')->everyMinute();

        //  Cron=/opt/php72/bin/php /home/user2065133/www/d0026877.atservers.net/artisan schedule:run >> /dev/null 2>&1

        //для тестирования я выполнял так:
        //$schedule->command('xmlsitemap')->cron('* * * * *')->sendOutputTo("/tmp/shed_log");
        //в формате крон ежеминутно(каждый запуск) и вывод в файл
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
