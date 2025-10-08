<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create()->each(function($user){
            \App\Models\Item::factory(3)->create([
                'user_id' => $user->id
            ]);
        });
    }
    
}
