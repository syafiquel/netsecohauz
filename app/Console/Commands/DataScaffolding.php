<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DataScaffolding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:reset_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset and initialize preset data';

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
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed --class=RolesAndPermissionsSeeder');
        Artisan::call('db:seed --class=SuperAdminSeeder');
        Artisan::call('db:seed --class=DepartmentSeeder');
        Artisan::call('db:seed --class=IndustrySeeder');
        Artisan::call('db:seed --class=ProductCategorySeeder');
        Artisan::call('db:seed --class=RackingSeeder');
    }
}
