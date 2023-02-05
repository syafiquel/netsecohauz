<?php

namespace Database\Seeders;

use App\Models\Racking;
use Illuminate\Database\Seeder;

class RackingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $row_count = 4;
        $column_count = 9;
        $sections = ['A', 'B', 'C' ];
        foreach($sections as $section)
            foreach(range(1, $column_count) as $i)
                foreach(range(1, $row_count) as $j)
                    Racking::create([ 'section' => $section, 'row' => $j, 'column' => $i ]);
        
    }
}
