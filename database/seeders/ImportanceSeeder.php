<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportanceSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        DB::table('importances')->insert([
            ['name' => '★★★★', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '★★★', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '★★', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '★', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
