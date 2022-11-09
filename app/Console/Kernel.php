<?php

namespace App\Console;

use App\Console\Commands\CheckUnpublishedEpisodes;
use App\Console\Commands\CollectOpenDownloadUrls;
use App\Console\Commands\DownloadAll;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use function Deployer\download;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('inspire')->hourly();
        $schedule->command(CheckUnpublishedEpisodes::class)->dailyAt('12:00');
        $schedule->command(CollectOpenDownloadUrls::class)->dailyAt('13:00');
        $schedule->command(DownloadAll::class)->dailyAt('14:00');
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
