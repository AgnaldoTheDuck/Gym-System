<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Category::create([
            'name'=>'Personal',
            'wage'=>1000,
        ]);

        Category::create([
            'name'=>'ASG',
            'wage'=>800,
        ]);
    }
}
