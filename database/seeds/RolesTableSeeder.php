<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role' => 'Admin',
                'status' => config('constants.status.active'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role' => 'User',
                'status' => config('constants.status.active'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
