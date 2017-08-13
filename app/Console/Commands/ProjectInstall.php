<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProjectInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Đang chạy cài đặt';

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
     * @return mixed
     */
    public function handle()
    {
        $this->line('Xin đợi  một chút');
        $this->info('Đang chuyển file .env.example thành .env ....');
        copy(base_path('.env.example'),base_path('.env'));

        $this->info('Đang chạy composer install ....');
        exec('composer install');

        $this->info('Đang chạy migrate ....');
        $this->call('migrate');

        $this->info('Đang chạy Seed ....');
        $this->call('db:seed');

        $this->info('Thành công hãy đăng nhập ngay');
    }
}
