<?php

namespace Database\Seeders;

use App\Models\BrandOwner;
use Illuminate\Database\Seeder;

class BrandOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BrandOwner::factory()->count(3)->create();
    }
}
