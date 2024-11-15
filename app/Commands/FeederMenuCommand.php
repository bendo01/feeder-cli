<?php
declare(strict_types=1);
namespace App\Commands;

// use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class FeederMenuCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:feeder-menu-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menampilkan Menu Applikasi Feeder-CLI';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $menu_root = null;
        do {
            $menu_root = $this->menu('Feeder CLI Menu', [
                'Downstream Data Mahasiswa Dari Feeder ke SIAKA',
                'Downstream Data Matakuliah Dari Feeder ke SIAKA',
                'upstream Data Aktifitas Program Studi Dari SIAKA ke Feeder',
                'upstream Data Aktifitas Perkuliahan Mahasiswa Dari SIAKA ke Feeder',
            ])->open();

            if (!is_null($menu_root) && $menu_root === 0) {
                $this->info('Menghitung Jumlah Data Di Feeder...');
                for($i = 1; $i <= 5; $i++) {
                    // Log::info('Menghitung Jumlah Data Di Feeder...');
                    $this->info('Mengambil Data Mahasiswa: '.$i.' Di Feeder...');
                    $this->notify("Menghubungi Feeder Server", "icon.png");
                    sleep(1);
                }
            } else if(!is_null($menu_root) && $menu_root === 1) {
                $this->info('Menghitung Jumlah Data Di Feeder...');
                for($i = 1; $i <= 5; $i++) {
                    // Log::info('Menghitung Jumlah Data Di Feeder...');
                    $this->info('Mengambil Data Matakuliah: '.$i.' Di Feeder...');
                    $this->notify("Menghubungi Feeder Server", "icon.png");
                    sleep(1);
                }
            } else if(!empty($menu_root) && $menu_root == 2) {
                for($i = 1; $i <= 5; $i++) {
                    // Log::info('Menghitung Jumlah Data Di Feeder...');
                    $this->info('Mengirim Data ke Feeder...');
                    $this->notify("Menghubungi Feeder Server", "icon.png");
                    sleep(1);
                }
            } else if(!empty($menu_root) && $menu_root == 3) {
                for($i = 1; $i <= 5; $i++) {
                    // Log::info('Menghitung Jumlah Data Di Feeder...');
                    $this->info('Mengirim Data ke Feeder...');
                    $this->notify("Menghubungi Feeder Server", "icon.png");
                    sleep(1);
                }
            }

            // $this->info("Pilihan Anda #$menu_root");
        } while (!is_null($menu_root));
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
