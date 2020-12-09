<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $documents = array('billing statement', 'proof of billing', 'company id', 'any valid id');
        
        for($index = 0; $index < 3; $index++){
            DB::table('product_categories')->insert([
                'title' =>  $tittle[$index],
                'description' =>  $description[$index],
                'status' => 'publish',
            ]);
        }

        for($index = 0; $index < 3; $index++){
            DB::table('specification_categories')->insert([
                'title' =>  $tittle[$index],
                'description' =>  $description[$index],
                'status' => 'publish',
            ]);
        }

        for($index = 0; $index < count($documents); $index++){
            DB::table('document_categories')->insert([
                'title' =>  $documents[$index],
                'description' =>  'documents description',
                'status' => 'publish',
            ]);
        }

        DB::table('users')->insert([
            'first_name' =>  'bernard',
            'last_name' =>  'balansag',
            'middle_name' => 'none',
            'home_address' => '8747 ba lepanto condominium corporation',
            'street_address' => 'paseo de roxas',
            'country_region' => 'phillipines',
            'contact_number' => '09214408767',
            'city' => 'makati',
            'state_province' => 'manila',
            'postal' => '1226',
            'role' => 'admin',
            'verified' => true,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('helloworld'),
        ]);
        DB::table('teams')->insert([
            'user_id' => 1,
            'name' => "bernard's",
            'personal_team' => 1
        ]);

    }
}

