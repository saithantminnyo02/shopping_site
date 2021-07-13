<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'name' => 'Clothes',
            'created_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Cosmetic',
            'created_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Shoes',
            'created_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Stationary',
            'created_at' => Carbon::now()
        ]);

        // factory(Category::class, 9)->create();

        
    }
}
