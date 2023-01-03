<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'name' => 'supplements', 'industry_id' => 1 ],
            [ 'name' => 'vitamins', 'industry_id' => 1 ],
            [ 'name' => 'medical kits', 'industry_id' => 1 ],
            [ 'name' => 'frozen foods', 'industry_id' => 2 ],
            [ 'name' => 'water bottles', 'industry_id' => 2 ],
            [ 'name' => 'biscuits', 'industry_id' => 2 ],
        ];

        foreach( $data as $datum )

        ProductCategory::create([
            'name' => $datum['name'],
            'industry_id' => $datum['industry_id']
        ]);
    }
}
