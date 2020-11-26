<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $tittle = array('motorcycle', 'services', 'parts');
        $description = array('motorcycle description', 'services description', 'parts description');
        
        for($index = 0; $index < 3; $index++){
            DB::table('product_categories')->insert([
                'title' =>  $tittle[$index],
                'description' =>  $description[$index],
                'status' => 'publish',
            ]);
        }
    }
}
