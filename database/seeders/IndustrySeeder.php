<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = ['medical', 'food & beverages' ];
        foreach($industries as $industry)
        {
            Industry::create([
                'name' => $industry
            ]);
        }
    }
}
